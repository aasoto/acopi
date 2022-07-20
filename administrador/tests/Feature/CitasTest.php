<?php

namespace Tests\Feature;

use App\CitasModel;
use App\RolesModel;
use App\RepresentanteEmpresaModel;
use App\EmpresasModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class CitasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_citas(){
        //prêt
        factory(CitasModel::class, 3)->create();
        factory(RolesModel::class, 3)->create();
        factory(RepresentanteEmpresaModel::class, 3)->create();
        factory(EmpresasModel::class, 3)->create();
        $response = $this->get('/citas/general');

        $response -> assertOk();

        $roles = RolesModel::all();
        $citas_afiliados = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.*', 'empresas.razon_social')->get();
        $total_citas_afiliados = count($citas_afiliados);
        $citas_interesados = CitasModel::where("tipo_usuario_cita", "interesado")->get();
        $total_citas_interesados = count($citas_interesados);

        $response->assertViewIs("paginas.citas.general");
        $response->assertViewHas("roles", $roles);
        $response->assertViewHas("citas_afiliados", $citas_afiliados);
        $response->assertViewHas("total_citas_afiliados", $total_citas_afiliados);
        $response->assertViewHas("citas_interesados", $citas_interesados);
        $response->assertViewHas("total_citas_interesados", $total_citas_interesados);
    }

    /** @test */
    public function ingresar_cita_afiliado(){
        factory(EmpresasModel::class, 3)->create();
        $empresa = EmpresasModel::first();
        factory(RepresentanteEmpresaModel::class, 3)->create();
        $afiliado = RepresentanteEmpresaModel::first();
        factory(RolesModel::class, 3)->create();
        $rol = RolesModel::first();
        $response = $this->post('/citas/general', [
            'soy_afiliado' => 'true',
            'id_empresa' => $empresa->id_empresa,
            'identificacion' => $afiliado->cc_rprt_legal,
            'fecha' => '2022-07-18',
            'hora' => '08:00:00',
            'area' => $rol->rol,
        ]);

        $response->assertRedirect('/citas/general');

        $this->assertCount(1, CitasModel::all());
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function ingresar_cita_interesado(){
        factory(RolesModel::class, 3)->create();
        $rol = RolesModel::first();
        $response = $this->post('/citas/general', [
            'soy_interesado' => 'true',
            'identificacion' => '123456789',
            'nombres' => 'Cristobal Colon',
            'fecha' => '2022-07-18',
            'hora' => '08:00:00',
            'area' => $rol->rol,
        ]);

        $response->assertRedirect('/citas/general');

        $this->assertCount(1, CitasModel::all());
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function listar_una_cita(){
        //prêt
        $cita = factory(CitasModel::class)->create();
        factory(RolesModel::class, 3)->create();
        factory(RepresentanteEmpresaModel::class, 3)->create();
        factory(EmpresasModel::class, 3)->create();
        $response = $this->get('/citas/general/'.$cita->id);

        $response -> assertOk();

        $cita_afiliado = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.primer_nombre', 'representante_empresa.segundo_nombre', 'representante_empresa.primer_apellido', 'representante_empresa.segundo_apellido', 'empresas.razon_social', 'empresas.nit_empresa')->where("id", $cita->id)->get();
        $cita_afiliado = json_decode(json_encode($cita_afiliado), TRUE);
        $roles = RolesModel::all();
        $citas_afiliados = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.*', 'empresas.razon_social')->get();
        $total_citas_afiliados = count($citas_afiliados);
        $citas_interesados = CitasModel::where("tipo_usuario_cita", "interesado")->get();
        $total_citas_interesados = count($citas_interesados);

        $response->assertViewIs("paginas.citas.general");
        $response->assertViewHas(array("cita"), $cita);
        $response->assertViewHas(array("roles"), $roles);
        $response->assertViewHas(array("citas_afiliados"), $citas_afiliados);
        $response->assertViewHas(array("total_citas_afiliados"), $total_citas_afiliados);
        $response->assertViewHas(array("citas_interesados"), $citas_interesados);
        $response->assertViewHas(array("total_citas_interesados"), $total_citas_interesados);
    }

    /** @test */
    public function actualizar_cita(){
        //prêt
        $cita = factory(CitasModel::class)->create();
        $empresa = factory(EmpresasModel::class)->create();
        $afiliado = factory(RepresentanteEmpresaModel::class)->create();
        $rol = factory(RolesModel::class)->create();
        $response = $this->put("/citas/general/".$cita->id, [
            'soy_afiliado' => 'true',
            'id_empresa' => $empresa->id,
            'identificacion' => $afiliado->cc_rprt_legal,
            'fecha' => $cita->fecha_cita,
            'hora' => $cita->hora_cita,
            'area' => $rol->rol,
            'estado' => $cita->estado_cita
        ]);

        $this->assertCount(1, CitasModel::all());

        $cita = $cita->fresh();

        $cita = CitasModel::first();
        $this->assertEquals($cita->id_empresa, $empresa->id);
        $this->assertEquals($cita->cc_rprt_legal, $afiliado->cc_rprt_legal);
        $this->assertEquals($cita->area, $rol->rol);
        $response->assertRedirect('/citas/general');
        $response->assertSessionHas('ok-actualizar');
    }

    /** @test */
    public function eliminar_cita_de_listado(){
        //prêt
        factory(CitasModel::class, 3)->create();
        $this->delete("/citas/general/1");
        $this->assertCount(2, CitasModel::all());
    }

    /** @test */
    public function eliminar_cita_unica(){
        //prêt
        $cita = factory(CitasModel::class)->create();
        $this->delete("/citas/general/".$cita->id);

        $this->assertCount(0, CitasModel::all());
    }
}
