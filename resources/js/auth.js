class Auth {
    constructor() {
        this.auth = false;
    }

    login(data) {
        this.auth = true;
        localStorage.setItem("token", data.access_token);
        localStorage.setItem("token_expiary", data.expires_in);
        localStorage.setItem("user", JSON.stringify(data.user));
    }

    logout() {
        this.auth = false;
        localStorage.removeItem("token");
        localStorage.removeItem("token_expiary");
        localStorage.removeItem("user");
    }

    isAuth() {
        return this.auth;
    }
}

export default new Auth();
