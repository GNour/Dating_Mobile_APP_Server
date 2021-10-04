import React from "react";
import ReactDOM from "react-dom";
import Login from "./pages/Login";
import Messages from "./pages/Messages";
import Images from "./pages/Images";
import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

export default function App() {
    return (
        <Switch>
            <Route exact path="/" component={Login} />
            <Route exact path="/images" component={Images} />
            <Route exact path="/messages" component={Messages} />
            <Route exact path="/logout" component={Logout} />
        </Switch>
    );
}

const Logout = () => {};

if (document.getElementById("App")) {
    ReactDOM.render(
        <Router>
            <React.StrictMode>
                <App />
            </React.StrictMode>
        </Router>,
        document.getElementById("App")
    );
}
