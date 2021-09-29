function validateForm () {
    let forms = document.querySelectorAll('[data-form]')
  
    function post(url, method, body) {
        let req = new XMLHttpRequest();
        req.open(method, url, true);
        req.setRequestHeader("Content-Type", "application/json");
        return new Promise((resolve, reject) => {
            req.addEventListener("load", function () {
                if (req.status < 400) {
                    resolve(JSON.parse(req.responseText));
                } else {
                    // reject(new Error("Request failed: " + req.statusText));
                    reject(JSON.parse(req.responseText));
                }
            });
            req.send(JSON.stringify(body));
        })
    }

    function checkElementValue(element) {
      return (element.value !== element.getAttribute("placeholder")) ? element.value : '';
    }

    function serialize(form) {
        const serialized = {};
        getFields(form).forEach(element => {
            let elementValue = checkElementValue(element);
            serialized[element.name] = elementValue;
            /* console.log('Element : ' + element.name + ' | Placeholder : ' + element.getAttribute("placeholder") + ' | Value : ' + element.value); */
        });

        return serialized;
    }
  
    function reset(form) {
        /* getFields(form).forEach(element => {
            switch (element.tagName.toLowerCase()) {
                case 'select':
                    element.querySelector('option').selected = 'selected';
                    break;
                default:
                    element.value = '';
            }
        }); */
        form.reset();
    }
  
    function removeInvalidMessage(parent) {
        const $invalidMessage = getFormChildren(parent, '', '.invalid-message');
        if ($invalidMessage) {
            $invalidMessage.parentNode.removeChild($invalidMessage);
        }
    }
  
    function invalidMessage(parent, fieldName, custom) {
        removeInvalidMessage(parent);
        const div = document.createElement('div');
        div.classList.add('invalid-message');
        div.classList.add('text-danger');
        if (custom) {
            div.innerHTML = custom;
        } else {
            div.innerHTML = `Le champ <em>${fieldName}</em> est obligatoire.`;
        }
        parent.appendChild(div);
    }

    function validPassword(value) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(value)
    }

    function validEmail(value) {
        return /^.+@.+\..{2,}$/.test(value)
    }
  
    function validTel (value) {
        /* @see https://stackoverflow.com/questions/16631571/javascript-regular-expression-detect-all-the-phone-number-from-the-page-source/16635935 */
        return /(\+?(?:(?:9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)|\((?:9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\))[0-9. -]{4,14})(?:\b|x\d+)/g.test(value)
    }
  
  
    function validation(element, checkError) {
        const $parent = element.parentNode;
        /* console.log('Element : ' + element.name + ' => ' + element.required) */
        if (element.required) {
            /* console.log(element.name + ' is required') */
            let elementValue = checkElementValue(element);
            if (elementValue === '') {
                /* console.log('Element empty : ' + element.name + ' => ' + element.required) */
                element.classList.add('invalid-field');
                $parent.classList.add('invalid-field-wrapper');
                invalidMessage($parent, element.name);
                /* if (checkError !== undefined) {
                    checkError = true;
                } */
                checkError = true;
            } else {
                $parent.classList.remove('invalid-field-wrapper');
                element.classList.remove('invalid-field');
                if (element.type === 'email') {
                    if (!validEmail(element.value)) {
                        invalidMessage($parent, '', "L'addresse email n'est pas valide");
                        checkError = true;
                        return;
                    }
                } else if (element.type === 'tel') {
                    if (!validTel(element.value)) {
                        invalidMessage($parent, '', "Le numéro n'est pas valide");
                        checkError = true;
                        return;
                    }
                } else if (element.type === 'password') {
                    if (!validPassword(element.value)) {
                        invalidMessage($parent, '', "Password valid must contains at least one uppercase letter, one lowercase letter, and one digit and its length must be at least 8 characters");
                        checkError = true;
                        return;
                    }

                    const dataRefer = element.getAttribute('data-refer')
                    if (dataRefer !== null) {
                        const currentValue = element.value
                        const referElement = document.getElementById(dataRefer)

                        if (currentValue && referElement.value) {
                            if (currentValue !== referElement.value) {
                                invalidMessage($parent, '', "Your password and confirmation password don't match");
                                checkError = true;
                                return;
                            }
                            else {
                                removeInvalidMessage($parent);
                                removeInvalidMessage(referElement.parentNode);
                            }
                        }
                    }
                }
                removeInvalidMessage($parent);
            }
        }
      return checkError;
    }
  
    function getFormChildren (form, type, selector) {
        return form[`querySelector${type}`](selector);
    }
  
    function getFields (form) {
        return getFormChildren(form, 'All', '[name]');
    }
  
    function getSubmitForm (form) {
        return getFormChildren(form, '', '.submit-form');
    }
  
    function getToast (form) {
        return getFormChildren(form, '', '.form-toast');
    }
  
    function formValidation(form) {
        const $error = document.querySelectorAll('.invalid-message')
        let hasError = false;
        let errorList = [];
        getFields(form).forEach(element => {
            errorList.push(validation(element, hasError));
        });
        return errorList.indexOf(true) !== -1 || $error.length > 0;
    }
  
    function formKeyUp(form) {
        getFields(form).forEach(element => {
            element.onkeyup = function () {
                validation(this);
            }
        });
    }
  
    function submittedMessage(form, type) {
        if (type === 'success') {
            document.getElementById('#form-success').click();
        }
        else {
            getFormChildren(form, 'All', '[class^="form-alert"]').forEach(element => {
                element.classList.remove('form-alert-visible');
                if (element.classList.contains(`form-alert-${type}`)) {
                    element.classList.add('form-alert-visible');
                }
            });
        }
    }
  
    function success(form) {
        const $toast = getToast(form);
        submittedMessage(form, 'success');
        getSubmitForm(form).disabled = false;
        if ($toast) {
            getToast(form).style.display = 'none';
        }
        form.lastname.focus()
        reset(form)
    }
    function error(form) {
        const $toast = getToast(form);
        submittedMessage(form, 'error');
        getSubmitForm(form).disabled = false;
        if ($toast) {
            getToast(form).style.display = 'none';
        }
    }

    function clearAlert(alertElement) {
        if (alertElement) {
            alertElement.classList.forEach(element => {
                alertElement.classList.remove(element)
            });
            alertElement.classList.add('alert');
            alertElement.classList.add('alert-dismissible');
            alertElement.classList.add('fade');
            alertElement.classList.add('hidden');
        }
    }

    function setAlert(alertElement, message, isSuccess = true) {
        if (alertElement) {
            alertElement.classList.remove('hidden');
            if (isSuccess) {
                alertElement.classList.add('alert-success');
            } else {
                alertElement.classList.add('alert-danger');
            }
            alertElement.classList.add('show');
            alertElement.innerHTML = message;
        }
    }
    
    let callback = [];
  
    forms.forEach((form, index) => {
      formKeyUp(form);
      const button = form.querySelector('[type="submit"]');
      callback = [...callback, button.dataset.callback];
      (function (i) {
            button.addEventListener('click', function (e) {
                e.preventDefault()

                const url = form.getAttribute('ajax-url')
                const method = form.getAttribute('method')
                const hasError = formValidation(form);
                /* console.log(hasError) */
                // const $toast = getToast(form);
                if (hasError) {
                    return;
                }

                /* if($toast) {
                    $toast.style.display = 'block';
                } */

                const formParams = serialize(form);
                Object.keys(formParams).forEach((item) => {
                    if (formParams[item] === undefined/*  || item.indexOf('recaptcha') !== -1 */) {
                        delete formParams[item];
                    }
                });

                const btn_callback = form.querySelector('.request-callback');
                const requestResponseContainer = form.querySelector('.alert');

                clearAlert(requestResponseContainer)

                post(url, method, formParams)
                .then((successResponse) => {
                    if (btn_callback !== null) {
                        btn_callback.setAttribute('request-callback', 'success')
                        btn_callback.setAttribute('request-id', successResponse.data.id)
                        btn_callback.click();
                    }
                    setAlert(requestResponseContainer, successResponse.message)
                    //alert refa vita ny modification mdp
                    alert(successResponse.message)
                    reset(form)
                    return;
                })
                .catch((errorResponse) => {
                    if (btn_callback !== null) {
                        btn_callback.setAttribute('request-callback', 'error')
                        btn_callback.click();
                    }
                    setAlert(requestResponseContainer, errorResponse.message, false)
                });
            })
        })(index)
    });
}
  
if( document.readyState !== 'loading' ) {
    validateForm();
} else {
    document.addEventListener("DOMContentLoaded", validateForm);
}