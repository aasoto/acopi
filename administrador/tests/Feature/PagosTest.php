<?php

namespace Tests\Feature;

use App\PagosModel;
use App\PagosGeneradosModel;
use App\PagosParametrosModel;
use App\UsuariosModel;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\RolesModel;
use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function listar_recibos_de_pago(){
        factory(PagosModel::class, 100)->create();
        factory(EmpresasModel::class, 100)->create();
        factory(RepresentanteEmpresaModel::class, 100)->create();

        $response = $this->get('/pagos/general');

        $response -> assertOk();

        $pagos = PagosModel::all();

        $response->assertViewIs("paginas.pagos.general");
        $response->assertViewHas("pagos", $pagos);
    }

    /** @test */
    public function generar_recibos_de_pago(){
        factory(PagosParametrosModel::class)->create();
        factory(EmpresasModel::class, 100)->create();
        factory(RepresentanteEmpresaModel::class, 100)->create();
        factory(RolesModel::class, 7)->create();
        $response = $this->post('/usuarios/agregarUser', [
            'num_documento' => '123456789',
            'email' => 'carmengomez@gmail.com',
            'nombre' => 'Carmen Helena Gomez Berrio',
            'id_rol' => '1',
        ]);

        $response -> assertOk();

        $usuario = UsuariosModel::first();

        $response = $this->post('/pagos/general', [
            'usuario' => $usuario->email,
            'password' => '123456789',
        ]);

        $response->assertRedirect('/pagos/general');

        $this->assertNotEmpty(PagosModel::all());
        $response->assertSessionHas('ok-crear');
    }

    /** @test */
    public function actualizar_recibo_de_pago(){
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'laravel'),
        ]);
        $this->withSession(['_token'=>'token']);

        $response = $this->post(route('login'), [
            '_token' => 'token',
            'email' => $user->email,
            'password' => $password,
        ]);
        //dump($response);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
        /***************************************** */
        $pago = factory(PagosModel::class)->create();
        $response = $this->put("/pagos/general/".$pago->id, [
            "accion" => "pagar"
        ]);

        $this->assertCount(1, PagosModel::all());

        $pago = $pago->fresh();

        $pago = PagosModel::first();
        $this->assertEquals($pago->estado, "pagado");
    }
}
