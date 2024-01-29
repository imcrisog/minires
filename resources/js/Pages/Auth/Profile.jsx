import { Link, Head, usePage } from '@inertiajs/react'

import Navbar from "../../Components/Navbar";

export default function Profile() {

    const { user, profile } = usePage().props;

    return (
        <>
            <Head title="Perfil" />
            
            <Navbar />

            <div className='w-full flex flex-col items-center'>
                <img className="w-1/2 h-[8rem] object-center object-cover z-10 -mb-10" src={route('files.index', {part: 'banners', filename: profile.banner.split('/')[1]})} />

                <img className="w-24 h-24 rounded-full object-center z-20 object-cover" src={route('files.index', {part: 'icons', filename: profile.icon.split('/')[1]})} />  
            
                <h1 className='text-2xl text-center mt-10 font-bold'> {user.name} </h1>

                <span className='mt-3 text-center font-semibold'> {profile.bio} </span>

                <span className='text-center'> Datos: {profile.premium == 1 ? 'Eres premium' : 'Eres no premium'} | {profile.type == 0 ? 'Usuario' : 'Profesor'} </span>
            </div>

            <Link href={route('auth.logout')}> Cerrar sesion </Link>
        </>
    )
}
