import React from "react";

export default function ImageCard() {
    return (
        <div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">User Name</h5>
                    <p class="card-text text-muted">Date:</p>
                    <a href="#" class="btn btn-success">
                        Approve
                    </a>
                    <a href="#" class="btn btn-danger">
                        Decline
                    </a>
                </div>
            </div>
        </div>
    );
}
