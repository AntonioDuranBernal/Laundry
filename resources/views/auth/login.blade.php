<x-layouts.app title="Datos de registro" meta-description="Registro">
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Ingresar</h1>
<form class="max-w-xl px-8 py-1 mx-auto bg-white rounded shadow dark:bg-slate-800"  action="{{route('session')}}" method="POST">
	@csrf
<div class="space-y-4">
		<label class="flex flex-col">
        <span class="font-serif text-slate-800 dark:text-slate-400">Email</span>
		<input class="rounded-md shadow-sm border-slate-800 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="email"  autofocus="autofocus" value="{{old('email')}}">
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
		<label class="flex items-center">
					<input class="border rounded dark:big-slate-900 dark: slate-300 dark:border-slate-700 text-sky-700 focus:border-sky-300 focus:ring focus:ring-slate dark:focus:ring-slate-800 focus:ring-popacity-50" type="checkbox" name="remember" >
        <span class="cursor-pointer ml-2 font-serif text-slate-800 dark:text-slate-400">Recuérdame</span>
	</label>
	    	<div class="flex items-center justify-between mt-4">
	    	<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{route('registro')}}">Registrarse</a>
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Ingresar</button>
            </div>
</form>
</x-layouts.app>