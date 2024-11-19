document.addEventListener('DOMContentLoaded', (event) => {
  const menuButton = document.getElementById('menu-button');
  const menu = document.querySelector('.menu');

  if (menuButton) {
    menuButton.addEventListener('click', () => {
      if (menu.style.left === '0px') {
        menu.style.left = '-250px'; // Fecha o menu
      } else {
        menu.style.left = '0px'; // Abre o menu
      }
    });
  }

  const homeButton = document.getElementById("home-button");
  if (homeButton) {
    homeButton.addEventListener("click", function() {
      window.location.href = "../home.php";
    });
  }

  const cadastrarButton = document.getElementById("cadastrar-button");
  if (cadastrarButton) {
    cadastrarButton.addEventListener("click", function() {
      document.querySelector("form").submit();
    });
  }

  const imcButton = document.getElementById("imc-button");
  if (imcButton) {
    imcButton.addEventListener("click", function() {
      window.open("../imc.php", "_blank", "width=250,height=250");
    });
  }

  const graficobutton =  document.getElementById("grafico-button");
  if (graficobutton) {
    graficobutton.addEventListener("click", function() {
    window.location.href = "gerargrafico.php";
  });
}

const pdfbutton = document.getElementById("pdf-button");
if (pdfbutton) {
  pdfbutton.addEventListener("click", function() {
  const tabela = document.querySelector("table"); // Selecione a tabela
  const tabelaHTML = tabela.outerHTML;
  
  fetch("../gerar_pdf.php", {
      method: "POST",
      headers: {
          "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "tabelaHTML=" + encodeURIComponent(tabelaHTML),
  })
  .then((response) => response.blob())
  .then((blob) => {
      // Crie um URL para o blob
      const blobUrl = URL.createObjectURL(blob);

      // Crie um link para o URL do blob
      const link = document.createElement("a");
      link.href = blobUrl;
      link.download = "estoque.pdf";

      // Clique automaticamente no link para iniciar o download
      link.click();
  });
});
}

  function atualizarPrecoEQuantidade() {
    const selectedProduto = document.querySelector('select[name="nomeproduto"]');
    if (selectedProduto) {
      const selectedOption = selectedProduto.options[selectedProduto.selectedIndex];
      const selectedPrecoVender = selectedOption.getAttribute('data-precovender');
      const selectedQuantidade = selectedOption.getAttribute('data-quantidade');
      const precovenderField = document.getElementById('precovenderField');
      const quantidadeField = document.getElementById('quantidadeField');

      if (selectedProduto.value) {
        precovenderField.textContent = "R$" + " " + selectedPrecoVender;
        quantidadeField.textContent = selectedQuantidade + " Kg";
      } else {
        precovenderField.textContent = "";
        quantidadeField.textContent = "";
      }
    }
  }

  const selectProdutoElement = document.querySelector('select[name="nomeproduto"]');
  if (selectProdutoElement) {
    selectProdutoElement.addEventListener('change', atualizarPrecoEQuantidade);
  }

  function atualizarAltura() {
    const selectedCliente = document.querySelector('select[name="nomecli"]');
    if (selectedCliente) {
      const selectedOption = selectedCliente.options[selectedCliente.selectedIndex];
      const selectedAltura = selectedOption.getAttribute('data-altura');
      const alturaField = document.getElementById('alturaField');

      if (selectedCliente.value) {
        alturaField.textContent = selectedAltura;
      } else {
        alturaField.textContent = "";
      }
    }
  }

  const selectClienteElement = document.querySelector('select[name="nomecli"]');
  if (selectClienteElement) {
    selectClienteElement.addEventListener('change', atualizarAltura);
  }
});
