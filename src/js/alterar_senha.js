function exibirErro() {
    var overlay = document.createElement("div");
    overlay.className = "overlay";

    var card = document.createElement("div");
    card.className = "card";

    var h1 = document.createElement("h1");
    h1.textContent = "Erro ao Recuperar Senha";

    var p = document.createElement("p");
    p.textContent = "Ocorreu um erro ao recuperar a senha. Verifique o email fornecido e tente novamente.";

    var link = document.createElement("a");
    link.href = "recuperar_senha.php";
    link.textContent = "Voltar para a página de recuperação de senha";

    card.appendChild(h1);
    card.appendChild(p);
    card.appendChild(link);

    document.body.appendChild(overlay);
    document.body.appendChild(card);

    // Remover mensagem após 5 segundos
    setTimeout(function() {
        overlay.remove();
        card.remove();
    }, 5000);
}

function exibirMensagemSucesso() {
    var overlay = document.createElement("div");
    overlay.className = "overlay";

    var card = document.createElement("div");
    card.className = "card";

    var h1 = document.createElement("h1");
    h1.textContent = "Senha Alterada com Sucesso!";

    var p = document.createElement("p");
    p.textContent = "Sua senha foi alterada com sucesso. Você pode fazer login usando a nova senha.";

    var link = document.createElement("a");
    link.href = "login.php";
    link.textContent = "Voltar para a página de login";

    card.appendChild(h1);
    card.appendChild(p);
    card.appendChild(link);

    document.body.appendChild(overlay);
    document.body.appendChild(card);

    // Remover mensagem e redirecionar após 5 segundos
    setTimeout(function() {
        overlay.remove();
        card.remove();
        window.location.href = "login.php";
    }, 5000);
}


window.addEventListener("DOMContentLoaded", function() {
    var urlParams = new URLSearchParams(window.location.search);
    var erro = urlParams.get("erro");
    var exibirErroPHP = true; // Defina o valor da variável de acordo com a condição desejada

    if (erro === "email" || exibirErroPHP) {
        exibirErro();
    }
});

window.addEventListener("DOMContentLoaded", function() {
    var urlParams = new URLSearchParams(window.location.search);
    var sucesso = urlParams.get("sucesso");

    if (sucesso === "true") {
        exibirMensagemSucesso();
    }
});
