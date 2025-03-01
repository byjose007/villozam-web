document.getElementById('contactForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const formData = new FormData(e.target);
  const response = await fetch(e.target.action, {
    method: 'POST',
    body: formData
  });
  
  const result = await response.json();
  const messageDiv = document.querySelector('.form-message');
  
  if (result.status === 'success') {
    messageDiv.textContent = '¡Mensaje enviado con éxito!';
    messageDiv.style.color = 'green';
    e.target.reset();
  } else {
    messageDiv.textContent = 'Error al enviar el mensaje. Intente nuevamente.';
    messageDiv.style.color = 'red';
  }
});
