<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ){}

    public function index(Request $request) // Coloco a classe e já injeto a dependência.
    {
        //$support = Support::all();
        //$support = new Support(); // não precisa pois já injetei a dependencia na chamada do método
        //$supports = $support->all(); // uma coléction, uma array de informações
        $support = $this->service->getAll($request->filter); // UTILIZANDO O SERVICE
        return view('admin.supports.index', compact('supports')); // compact serve para mandar o objeto para a view blade
    }

    public function show(string $id) // recupero o valor informado na rota {id}, que veio do index, lincando o id da entidade enviada para cá  
    {
        //$support = Support::where('id', $id)->first(); // define qual a coluna no DB que irá pesquisar, depois informa a variável
                                            //find($id), serve para buscar apenas um objeto daquela ID
        //if (!$support = Support::find($id)) { // serve para verificar se existe a ID que foi informado, se não encontrar, irá retornar
        if (!$support = $this->service->findOne($id)) { // Utilizando agora o SERVICE
            return redirect()->back();
        };
        
        return view('admin.supports.show', compact('support'));
        
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support) // Serve para receber todos os dados enviados pelos formulários no blade
    {                                                         //Support serve para já criar uma instância do nosso model em uma variável
        // dd($request->all()); // Recupera todos os campos do formulário
        // dd($request->only(['subject', 'body'])); // Retorna apenas a lista dos campos do formulário definido
        // dd($request->body); // Retorna somente um campo
        // dd($request->get('body')); // Retorna somente um campo body
        // dd($request->get('xxxx', 'defaut')); // Se não encontrar o campo xxxx, traz um valor padrão no caso 'defaut'

        // $data = $request->all();
        // $data['status'] = 'a'; // status é uma variável que não veio do form, assim precisamos setar. Note que $data é um array e desta forma adicionamos um item a esta array
        // dd($data);
        // Support::create($data); método sem injetar a model no método
        // $support = $support->create($data); // cria um objeto de support
        //dd($support);

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        //if (!$support = $support->where('id', $id)->first()) { //Método padrão
        if (!$support = $this->service->findOne($id)) { 
            return redirect()->back();
        }
        //dd($support);
        return view('admin.supports.edit', compact('support'));

    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        // if (!$support = $support->where('id', $id)->first()) { 
        //     return redirect()->back();
        // }
        //Alternativa para cadastro, neste caso, edita especificamente cada variável e no final precisa ser salvo.
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save(); 

        // $support->update($request->only([ // serve para definir quais campos serão atualizados
        //     'subject', 'body'
        // ]));
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );
        if (!$support) { 
            return redirect()->back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        // if (!$support = $support->where('id', $id)->first()) {  // método padrão MVC Falta injetar a dependencia
        //        return redirect()->back();
        // }
        // $support->delete();

        $this->service->delete($id);

        return redirect()->route('supports.index');

    }
}
