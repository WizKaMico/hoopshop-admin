function displayPhoto(event, imageId) {
    const input = event.target;
    if (input.files && input.files[0]) {
      const reader = new FileReader();
  
      reader.onload = function(e) {
        const image = document.getElementById(imageId);
        image.src = e.target.result;
        image.style.display = 'block';
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  