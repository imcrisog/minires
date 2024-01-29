import { Head, usePage, Link } from '@inertiajs/react'

import Navbar from "../../Components/Navbar";

export default function Index() {

    const { courses } = usePage().props

    console.log(courses)

    return (
        <>
            <Head title='Cursos' />

            <Navbar />

            <h1> Lista de los cursos </h1>

            <div>
                {
                    courses.length < 1 ? <div> No hay cursos aun </div> : 
                    courses.map((course, index) => {
                        return (
                            <div key={index}>
                                <h1> {course.name} </h1>
                                <span> Creado por  </span>
                            </div>
                        )
                    })
                }
            </div>
        </>
    )
}
