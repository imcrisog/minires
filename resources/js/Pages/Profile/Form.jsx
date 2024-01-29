import { Head, useForm, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Form() {

    const { user } = usePage().props

    const [icon, setIcon] = useState(null)
    const [banner, setBanner] = useState(null)

    const { data, setData, processing, post, errors, progress } = useForm({
        icon: null,
        banner: null,
        bio: '',
        type: 0
    })

    const handleUploadBanner = (e) => {
        setBanner(URL.createObjectURL(e.target.files[0]))
        setData('banner', e.target.files[0])
    }

    const handleUploadIcon = (e) => {
        setIcon(URL.createObjectURL(e.target.files[0]))
        setData('icon', e.target.files[0])
    }

    const handleSubmit = (e) => {
        e.preventDefault();

        post(route('profile.store'))
    }

    return (
        <>
            <Head title="Crear perfil" />

            <div className="flex flex-wrap items-center justify-center"> 
                <div className="w-full md:w-1/2 flex flex-col justify-center items-center h-full">

                    <form onSubmit={handleSubmit} className="w-2/3 bg-zinc-900 p-4 mt-10 rounded-md">
                        <h1 className="text-center text-2xl font-semibold"> Crea tu perfil </h1>

                        <div className="w-full flex flex-col space-y-7 my-7">
                            <div className="w-full">
                                <h1> Banner </h1>
                                <input type="file" onChange={handleUploadBanner} placeholder="Banner" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" required />
                            </div>

                            <div className="w-full">
                                <h1> Icono </h1>
                                <input type="file" onChange={handleUploadIcon} placeholder="Icon" className="rounded-xl bg-zinc-700 py-3 px-3 focus:outline-none focus:ring-4 focus:ring-zinc-400" required />
                            </div>

                            <textarea value={data.bio} onChange={e => setData('bio', e.target.value)} name="bio" cols="30" rows="10" className="focus:outline-none bg-zinc-700 py-3 px-3"></textarea>
                        
                        </div>                    

                        <button className="mt-4 w-full bg-zinc-600 hover:bg-zinc-700 font-semibold py-2 rounded-xl" type="submit" disabled={processing}> Crear perfil </button>
                    </form>
                </div>

                <div className="w-full md:w-1/2">
                    <h1> Tu perfil </h1>

                    <div className="bg-zinc-900 p-5 flex flex-col justify-center items-center">
                        <img className="w-1/2 h-[8rem] object-center object-cover z-10 -mb-10" src={banner} />

                        <img className="w-24 h-24 rounded-full object-center z-20 object-cover" src={icon} />  

                        <h1 className="text-center font-extrabold text-2xl"> {user.name} </h1>

                        <span className="text-center font-bold"> "{data.bio}" </span>
                    </div>
                </div>
            </div>
        </>
    )
}
