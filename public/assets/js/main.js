
const dropdownButton = document.getElementById('dropdown-menu-button');
const dropdownMenu = document.getElementById('dropdown-menu');

dropdownButton.addEventListener('click', function () {
    const expanded = dropdownButton.getAttribute('aria-expanded') === 'true' || false;
    dropdownButton.setAttribute('aria-expanded', !expanded);
    console.log(dropdownMenu)
    dropdownMenu.classList.toggle('hidden');
});


const form = document.querySelector('form');
const steps = form.querySelectorAll('div');

let currentStep = 0;

function showStep(step) {
  steps.forEach((step, index) => {
    if (index === currentStep) {
      step.style.display = 'block';
    } else {
      step.style.display = 'none';
    }
  });
}

function nextStep() {
  currentStep++;
  if (currentStep >= steps.length) {
    currentStep = steps.length - 1;
  }
  showStep(currentStep);
}

function previousStep() {
  currentStep--;
  if (currentStep < 0) {
    currentStep = 0;
  }
  showStep(currentStep);
}

showStep(currentStep);

form.addEventListener('submit', function(event) {
  event.preventDefault();
  // Traitez les données du formulaire ici
  // et passez à l'étape suivante ou soumettez le formulaire
  nextStep();
});





