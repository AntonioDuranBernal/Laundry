<x-layouts.app title="Datos de registro" meta-description="Registro">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Registro</h1>
<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800"
    action="{{route('user.store')}}" method="POST">
	@csrf
<div class="space-y-4">
	<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Nombre(s)</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" autofocus="autofocus" type="text" name="name" value="{{old('name')}}">
		@error('nombre')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Apellidos</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" autofocus="autofocus" type="text" name="apellidos" value="{{old('apellidos')}}">
		@error('apellidos')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Celular</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" autofocus="autofocus" type="text" name="celular" value="{{old('celular')}}">
		@error('celular')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Email</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="email" value="{{old('email')}}">
		@error('email')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Password</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="password" name="password" >
		@error('password')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Confirmación de password</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="password" name="password_confirmation">
		@error('password_confirmation')
		<small class="font-bold text-red-500/80">{{$message}}</small>
		@enderror
	</label>
				<span class="font-serif text-slate-800 dark:text-slate-400">Tipo de usuario</span>
				<div class="flex flex-col">
					<select class="form-select appearance-none
					block
					w-full
					px-3
					py-1.5
					text-base
					font-normal
					text-gray-700
					bg-white bg-clip-padding bg-no-repeat
					border border-solid border-gray-300
					rounded
					transition
					ease-in-out
					m-0
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Colaborador" type="text" name="rol" autofocus="autofocus">
					<option value="Colaborador">Colaborador</option>
					<option value="Administrador">Administrador</option>
				</select>
			</div>
	    	<div class="flex items-center justify-between mt-4">
	    	<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('login')}}">Login</a>
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Guardar</button>
            </div>
</form>
</x-layouts.app>