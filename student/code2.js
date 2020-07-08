function show(event, id) {
    event.preventDefault();
    
    if (id.style.display == "block") {
      id.style.display = "none"
    } else {
      id.style.display="block"
    }
  }

  function toggleDropdow() {
          let navbarToggle = document.getElementById("navt");
          if (navbarToggle.className === 'my-flex') {
              navbarToggle.className = 'respod';
              document.getElementById("dropdownLink").style.display="block";

          } else if (navbarToggle.className === 'respod') {
            navbarToggle.className += ' oya';

          } else if (navbarToggle.className === 'respod oya') {
            navbarToggle.className = 'respod';
            document.getElementById("dropdownLink").style.display="block";
          }

      }
  function toggleDropdow2() {
          let navbarToggle = document.getElementById("navt");
          if (navbarToggle.className === 'my-flex') {
              navbarToggle.className = 'respod';
              document.getElementById("dropdownLink").style.display="block";

          } else if (navbarToggle.className === 'respod') {
            navbarToggle.className += ' oya';
            document.getElementById("dropdownLink").style.display="none";
          } else if (navbarToggle.className === 'respod oya') {
            navbarToggle.className = 'respod';
            document.getElementById("dropdownLink").style.display="none";

          }

          else {
              navbarToggle.className = 'my-flex';
              document.getElementById("dropdownLink").style.display="none";
          }

      }
