import { Link } from "@inertiajs/react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faArrowLeft } from "@fortawesome/free-solid-svg-icons";

export default function ToHome() {
    return (
        <Link className="absolute left-5 top-5" href={route('home')}> 
            <FontAwesomeIcon icon={faArrowLeft} /> 
        </Link>
    )
}
