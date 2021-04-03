// change content of the main page enum: main, form with phone number, form with email
function changePage (curElem, targetElem, type) {
  curElem = document.getElementById(curElem)
  targetElem = document.getElementById(targetElem)

  curElem.classList.remove('visible')
  curElem.classList.add('invisible')

  targetElem.classList.remove('invisible')
  targetElem.classList.add('visible')

  if (type === 'phone') {
    customizeForm('form_phone', 'form_email')
  } else if (type === 'email') {
    customizeForm('form_email', 'form_phone')
  }
}

// hide / show the necessary form field
function customizeForm (visibleElem, hideElem) {
  hideElement(hideElem)
  showElement(visibleElem)

  var visibleElemInput = visibleElem + '_input'
  var hideElemInput = hideElem + '_input'

  document.getElementById(hideElemInput).setAttribute('novalidate', 'true')
  document.getElementById(hideElemInput).removeAttribute('required')

  document.getElementById(visibleElemInput).removeAttribute('novalidate')
  document.getElementById(visibleElemInput).setAttribute('required', 'true')
}

function disableSubmit () {
  document.getElementById('submit').disabled = true
  hideElement('submit')
}

function enableSubmit () {
  document.getElementById('submit').disabled = false
  showElement('submit')
}

function changeSubmitState (element) {
  if (element.checked) {
    enableSubmit()
  } else {
    disableSubmit()
  }
}

// utility functions to show hide the element
function hideElement (elemName) {
  document.getElementById(elemName).classList.add('invisible')
  document.getElementById(elemName).classList.remove('visible')
}

function showElement (elemName) {
  document.getElementById(elemName).classList.add('visible')
  document.getElementById(elemName).classList.remove('invisible')
}
