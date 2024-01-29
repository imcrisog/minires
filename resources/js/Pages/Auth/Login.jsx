import { Head, Link, useForm } from "@inertiajs/react";
import { useState } from "react";

import ToHome from "../../Components/ToHome";

import Logo from "../../Assets/logo.png";

export default function Login() {

    const [see, setSee] = useState(false)

    const { data, setData, processing, post, errors } = useForm({
        email: '',
        password: '' 
    });

    const handleSubmit = (e) => {
        e.preventDefault()
        post(route('auth.store.login'));
    }

    return (
        <>
            <Head title="Login" />

            <h1 className="absolute w-full mt-5 text-red-500 font-bold text-center"> 
                {errors.email}
                {errors.password}
                {errors.user}
            </h1>

            <ToHome />

            <div className="h-screen w-full">
                <div className="flex flex-col justify-center items-center h-full">
                    <img className="w-1/6 mb-5" src={Logo} />
                    <form onSubmit={handleSubmit} className="w-1/3 bg-zinc-900 p-4 rounded-md">
                        <h1 className="text-center text-2xl font-semibold"> Inicia Sesion </h1>

                        <div className="flex flex-col space-y-7 my-7">
                            <input value={data.email} onChange={(e) => setData('email', e.target.value)} type="email" placeholder="Correo electronico" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" autoComplete="off" required />
                            <input value={data.password} onChange={(e) => setData('password', e.target.value)} type={see ? 'text' : 'password'} placeholder="Contraseña" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" autoComplete="off" required />
                        </div>

                        <div className="flex w-full justify-between items-center">
                            <Link className="border-b-2 duration-200 hover:border-blue-500 hover:text-blue-200" href={route('auth.forgot')}> Olvide mi contraseña </Link>
                            <div className="flex items-center space-x-2">
                                <label htmlFor="see"> Ver contraseña </label>
                                <input onClick={() => setSee(!see)} className="mt-1" type="checkbox" id="see" />
                            </div>
                        </div>

                        <button disabled={processing} className="mt-4 w-full bg-zinc-600 hover:bg-zinc-700 font-semibold py-2 rounded-xl" type="submit"> Iniciar Sesion </button>

                        <div className="flex justify-center mt-5">
                            <Link className="border-b-2 duration-200 hover:border-orange-500 hover:text-orange-200" href={route('auth.register')}> No tengo cuenta </Link>
                        </div>
                    </form>
                </div>
            </div>
        </>
    )
}