import React from "react";
import Navbar from "../components/Navbar";
const Login = () => {
    return (
        <>
            <div className="container mt-5">
                <div className="row">
                    <div className="col-sm"></div>
                    <div className="col p-5 rounded bg-light">
                        <form>
                            <h3>Sign In</h3>

                            <div className="form-group">
                                <input
                                    type="email"
                                    className="form-control"
                                    placeholder="Enter email"
                                />
                            </div>

                            <div className="form-group">
                                <input
                                    type="password"
                                    className="form-control"
                                    placeholder="Enter password"
                                />
                            </div>

                            <button
                                type="submit"
                                className="btn btn-primary btn-block"
                            >
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
