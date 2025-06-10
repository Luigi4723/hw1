/*

// 1. Quando la pagina è pronta
document.addEventListener("DOMContentLoaded", () => {
    // Login
    const loginForm = document.querySelector("#login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", handleLogin);
    }

    //Like
    document.querySelectorAll(".like-button").forEach(button => {
        button.addEventListener("click", () => toggleLike(button.dataset.id));
    });

    // Logout
    const logoutBtn = document.querySelector("#logout");
    if (logoutBtn) {
        logoutBtn.addEventListener("click", logoutUser);
    }

    // Home
    loadHomeContent();
});

// 2. Login
async function handleLogin(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const response = await fetch("api/login.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        window.location.href = "home.html";
    } else {
        alert(result.message || "Errore nel login");
    }
}

//3. Like
async function toggleLike(itemId) {
    const response = await fetch("api/like.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: itemId })
    });

    const result = await response.json();
    if (result.success) {
        alert("Like aggiornato!");
    } else {
        alert("Errore");
    }
}
    

// 4. Logout
async function logoutUser() {
    const response = await fetch("api/logout.php");
    const result = await response.json();

    if (result.success) {
        window.location.href = "index.html";
    } else {
        alert("Errore nel logout");
    }
}

// 5. Caricamento home dinamico
async function loadHomeContent() {
    const container = document.querySelector("#home-content");
    if (!container) return;

    const response = await fetch("api/home-content.php");
    const data = await response.json();

    container.innerHTML = "";
    data.forEach(item => {
        const div = document.createElement("div");
        div.className = "item";
        div.innerHTML = `
            <h3>${item.title}</h3>
            <p>${item.description}</p>
            <button class="like-button" data-id="${item.id}">❤️ Like</button>
        `;
        container.appendChild(div);
    });
}


//registrazione
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("register-form");

    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            const errorMsg = document.getElementById("error-msg");
            const successMsg = document.getElementById("success-msg");

            // Semplice validazione lato client
            if (username.length < 3 || password.length < 3) {
                errorMsg.textContent = "Username o password troppo corti.";
                successMsg.textContent = "";
                return;
            }

            try {
                const response = await fetch("register.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ username, password })
                });

                const data = await response.json();

                if (data.success) {
                    successMsg.textContent = data.message;
                    errorMsg.textContent = "";
                    form.reset();
                } else {
                    errorMsg.textContent = data.message;
                    successMsg.textContent = "";
                }
            } catch (error) {
                errorMsg.textContent = "Errore di connessione al server.";
                successMsg.textContent = "";
            }
        });
    }
});
*/