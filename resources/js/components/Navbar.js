import React from "react";
import { NavLink } from "react-router-dom";

export default function Navbar() {
    const logout = async () => {
        axios
            .post(
                "http://localhost:8000/api/auth/logout",
                {},
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem(
                            "token"
                        )}`,
                    },
                }
            )
            .then((response) => {});
    };
    return (
        <div>
            <nav className="navbar custom__navbar navbar-expand-lg navbar-dark mb-5">
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
                        <li className="nav-item custom__navbar__link">
                            <NavLink
                                className="nav-link custom__navbar__link--a"
                                to="/images"
                            >
                                Images
                            </NavLink>
                        </li>
                        <li className="nav-item custom__navbar__link">
                            <NavLink
                                className="nav-link custom__navbar__link--a"
                                to="/messages"
                            >
                                Messages
                            </NavLink>
                        </li>
                        <li className="nav-item custom__navbar__link">
                            <NavLink
                                className="nav-link custom__navbar__link--a"
                                to="/"
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
