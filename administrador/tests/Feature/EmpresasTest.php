<?php

namespace Tests\Feature;

use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\SectorEmpresaModel;
use App\PaginaWebModel;
use App\EmpleadosAfiliadosModel;
use App\PagosModel;
use App\MunicipiosModel;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function listar_empleados_empresas(){
        factory(PaginaWebModel::class)->create();
        factory(EmpresasModel::class, 100)->create();
        factory(EmpleadosAfiliadosModel::class, 1000)->create();

        $response = $this->get('/afiliados/afiliadosEmpleados');

        $response -> assertOk();

        $empleados = EmpleadosAfiliadosModel::all();

        $response->assertViewIs("paginas.afiliados.afiliadosEmpleados");
        $response->assertViewHas("empleados", $empleados);
    }

    /** @test */
    public function listar_empresas(){
        factory(SectorEmpresaModel::class, 7)->create();
        factory(MunicipiosModel::class, 5)->create();
        factory(RepresentanteEmpresaModel::class, 100)->create();
        factory(EmpresasModel::class, 100)->create();
        factory(PaginaWebModel::class)->create();

        $response = $this->get('/afiliados/consultarEmpresas');

        $response -> assertOk();

        $sector_empresa = SectorEmpresaModel::all();
        $municipios = MunicipiosModel::all();
        $paginaweb = PaginaWebModel::all();

        $response->assertViewIs("paginas.afiliados.consultarEmpresas");
        $response->assertViewHas("sector_empresa", $sector_empresa);
        $response->assertViewHas("municipios", $municipios);
        $response->assertViewHas("paginaweb", $paginaweb);
    }

    /** @test */
    public function mostrar_empresas_inactivas(){
        factory(PaginaWebModel::class)->create();



    }
}
