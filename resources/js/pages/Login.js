import React from "react";
import auth from "../auth";
import { useState } from "react";
import axios from "axios";
import { Redirect } from "react-router";
const Login = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [redirect, setRedirect] = useState(false);
    const submit = async (event) => {
        event.preventDefault();

        axios
            .post("http://localhost:8000/api/auth/login", { email, password })
            .then((response) => {
                setRedirect(true);
                console.log(response.data);
                auth.login(response.data);
            });
    };

    if (redirect) {
        return <Redirect to="/images" />;
    }
    return (
        <>
            <div className="container mt-5">
                <div className="row">
                    <div className="col-sm"></div>
                    <div className="col p-5 rounded custom_col">
                        <div className="d-flex justify-content-center mb-5 ">
                            <div className="logo_img"></div>
                        </div>
                        <form onSubmit={submit}>
                            <div className="form-group">
                                <input
                                    type="email"
                                    className="form-control"
                                    onChange={(e) => setEmail(e.target.value)}
                                    placeholder="Email"
                                />
                            </div>

                            <div className="form-group">
                                <input
                                    type="password"
                                    className="form-control"
                                    onChange={(e) =>
                                        setPassword(e.target.value)
                                    }
                                    placeholder="Password"
                                />
                            </div>

                            <button type="submit" className="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                    <div className="col-sm"></div>
                </div>
            </div>
        </>
    );
};

export default Login;
