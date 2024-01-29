import { Link, Head, useForm } from "@inertiajs/react";
import { useState } from "react";

import ToHome from "../../Components/ToHome";

import Logo from "../../Assets/logo.png";

export default function Register() {

    const [see, setSee] = useState(false)

    const { data, setData, processing, post, errors } = useForm({
        username: '',
        email: '',
        password: ''
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('auth.store.register'));
    }

    return (
        <>
            <Head title="Register" />

            <h1 className="absolute w-full mt-5 text-red-500 font-bold text-center"> 
                {errors.username}
                {errors.email}
                {errors.password}
                {errors.user}
            </h1>

            <ToHome />

            <div className="h-screen w-full">
                <div className="flex flex-col justify-center items-center h-full">
                    <img className="w-1/6 mb-5" src={Logo} />
                    <form onSubmit={handleSubmit} className="w-1/3 bg-zinc-900 p-4 rounded-md">
                        <h1 className="text-center text-2xl font-semibold"> Registrate </h1>

                        <div className="flex flex-col space-y-7 my-7">
                            <input type="text" value={data.username} onChange={e => setData('username', e.target.value)} placeholder="Username" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" autoComplete="off" required />

                            <input type="text" value={data.email} onChange={e => setData('email', e.target.value)} placeholder="Email" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" autoComplete="off" required />

                            <input type={see ? 'text' : 'password'} value={data.password} onChange={e => setData('password', e.target.value)} placeholder="Password" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" autoComplete="off" required />
                        </div>

                        <div className="flex w-full justify-between items-center">
                            <Link className="border-b-2 duration-200 hover:border-blue-500 hover:text-blue-200" href={route('auth.login')}> Ya tengo cuenta </Link>
                            <div className="flex items-center space-x-2">
                                <label htmlFor="see"> Ver contraseña </label>
                                <input onClick={() => setSee(!see)} className="mt-1" type="checkbox" id="see" />
                            </div>
                        </div>                        

                        <button className="mt-4 w-full bg-zinc-600 hover:bg-zinc-700 font-semibold py-2 rounded-xl" type="submit" disabled={processing}> Registrarse </button>
                    </form>
                </div>
            </div>
        </>
    )
}