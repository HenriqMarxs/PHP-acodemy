// função para mostrar e ocultar a senha
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const toggleImg = document.getElementById('toggleImg');

  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleImg.src = '../images/icons/visibility.png';
      toggleImg.alt = 'Ocultar Senha';
  } else {
      passwordInput.type = 'password';
      toggleImg.src = '../images/icons/visibility_off.png';
      toggleImg.alt = 'Mostrar Senha';
  }
}