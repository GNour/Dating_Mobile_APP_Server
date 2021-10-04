import React from "react";
import { NavLink } from "react-router-dom";

export default function Navbar(props) {
    const logout = async (event) => {
        axios
            .post("http://localhost:8000/api/auth/logout")
            .then((response) => {});
    };
    return (
        <div>
            <nav className="navbar navbar-expand-lg navbar-dark mb-5 bg-dark">
                <button
                    className="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul className="navbar-nav mr-auto">
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/images">
                                Images
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/messages">
                                Messages
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink
                                className="nav-link"
                                to="/login"
                                onClick={logout}
                            >
                                Logout
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    );
}
