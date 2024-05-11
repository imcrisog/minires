import { Link, Head, usePage } from "@inertiajs/react";
// import React, { useState } from "react";

import Logo from "../Assets/logo.png";

export default function Navbar() {

    // const [megaMenu, setMegaMenu] = useState(0)

    const { user } = usePage().props;

    return (
        <>
            <div className="mx-auto container py-5 flex justify-between items-center">
                <Link href={route('home')}>
                    <img className="h-12" src={Logo} />
                </Link>

                <div className="flex items-center space-x-5">
                    { !user ? (
                        <>
                            <Link href={route('auth.login')} className="border-b-2 border-transparent duration-200 hover:border-blue-500 font-semibold"> Login </Link>
                            <Link href={route('auth.register')} className="border-b-2 border-transparent duration-200 hover:border-blue-500 font-semibold"> Register </Link>
                        </>
                        ) 
                        : (
                            <Link href={route('profile')} className="border-b-2 border-transparent duration-200 hover:border-blue-500 font-semibold"> Perfil </Link>         
                        )
                    }   
                </div>

            </div>
        </>
    )
}
