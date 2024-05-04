<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*// Возвращает uri запроса
        $uri = $request->path();
        //dd($uri);

        // Проверяем маршрут
        if ($request->routeIs('admin.*')) {
            //dd(['route' => 'admin']);
        }

        // Возвращает url запроса
        $url = $request->url();
        //dd($url);

        // Возвращает хост
        $request->httpHost();
        //dd($request->httpHost());

        // Возвращает схему и хост
        $request->schemeAndHttpHost();
        //dd($request->schemeAndHttpHost());

        // Выполняет блок если содержится заголовок
        if ($request->hasHeader('X-Header-Name')) {
            //dd($request->headers->all());
        }

        // Получаем значение токена
        $token = $request->bearerToken();
        //dd($token);

        // Выполняет блок для указанного типа контента
        if ($request->accepts(['text/html', 'application/json'])) {
            dd($request->headers->all());
        }

        // Вернуть весь массив
        $request->all();
        //dd($request->all());

        // Коллекция данных
        $request->collect();
        //dd($request->collect()->all());

        // Работа с конкретными полями
        $name = $request->input('name');
        //dd($name);

        // Работа с query параметрами
        $name = $request->query('name');
        //dd($name);

        // Приводит значение к string c доп обработкой
        $name = $request->string('name')->trim();
        //dd($name);

        // Приводит значение к boolean
        $active = $request->boolean('active');
        //dd($active);

        // Пытается привести значение к дате
        $birthday = $request->date('birthday');
        //dd($birthday->format('d-m-Y'));

        // Работа с массивом объектов используя точечную нотацию
        $name = $request->input('user.*.name');
        //dd($name);

        // Получаем name динамически
        $name = $request->name;
        //dd($name);

        // Проверяет, присутствует ли в запросе name
        if ($request->has('name')) {
            //dd(true);
        }

        // Возвращает true, если присутствует любое из указанных значений
        if ($request->hasAny(['name', 'email'])) {
            //dd(true);
        }

        // Выполняем замыкание когда name имеет непустое значение
        $request->whenHas('name', function (string $input) {
            //dd(true);
        });

        // Проверяем что name не пустой и присутствует в запросе
        if ($request->filled('name')) {
            //dd(true);
        }

        // Выполняем блок если name или email не пустые
        if ($request->anyFilled(['name', 'email'])) {
            //dd(true);
        }

        // Если name заполнено вызываем замыкание
        $request->whenFilled('name', function (string $input) {
            //dd(true);
        });


        $file = $request->file('file');


        if ($request->hasFile('photo')) {
            // ...
        }


        if ($request->file('photo')->isValid()) {
            // ...
        }*/


        $path = $request->file('photo')->path();

        $extension = $request->file('photo')->extension();

        $path = $request->file('photo')->store('images');

        $path = $request->file('photo')->storeAs('images', 'filename.jpg');

        $request->validate([
            'name'  => ['required', 'string'],
            'age'   => ['numeric', 'nullable'],
            'file'  => ['required', 'file', 'mimes:jpg,png'],
            'email' => ['required', 'email:dns']
        ], [
            'name.required' => 'Имя обязательно для заполнения'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
