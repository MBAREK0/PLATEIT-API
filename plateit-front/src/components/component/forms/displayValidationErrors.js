export const displayValidationErrors = (errors) => {
  for (const field in errors) {
    if (errors.hasOwnProperty(field)) {
      const errorMessage = errors[field][0];
      console.error(`${field}: ${errorMessage}`);
      validationError.value = errorMessage;
      showErrorToast(errorMessage); 
    }
  }
};

export const showErrorToast = (errorMessage) => {
    $toast.error(errorMessage, {
      position: 'bottom-right',
      duration: 333000,
      onClick: () => {
        console.log('Error toast clicked');
      },
      onDismiss: () => {
        console.log('Error toast dismissed');
      },
      classes: ['custom-toast-class'], // Add custom CSS class for the toast
    });
  };