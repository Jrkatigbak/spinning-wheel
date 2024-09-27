  /**
 * Prize data will space out evenly on the deal wheel based on the amount of items available.
 * @param text [string] name of the prize
 * @param color [string] background color of the prize
 * @param reaction ['resting' | 'dancing' | 'laughing' | 'shocked'] Sets the reaper's animated reaction
 */
  const prizes = options;
  
  const wheel = document.querySelector(".deal-wheel");
  const spinner = wheel.querySelector(".spinner");
  const trigger = wheel.querySelector(".btn-spin");
  const ticker = wheel.querySelector(".ticker");
  const reaper = wheel.querySelector(".grim-reaper");
  const prizeSlice = 360 / prizes.length;
  let predictedIndex_set_by_user = '';
  function myFunction() {
    predictedIndex_set_by_user = document.getElementById("key").value;
  }
 

  const prizeOffset = Math.floor(180 / prizes.length);
  const spinClass = "is-spinning";
  const selectedClass = "selected";
  const spinnerStyles = window.getComputedStyle(spinner);
  let tickerAnim;
  let rotation = 0;
  let currentSlice = 0;
  let prizeNodes;
  

  const predictWinner = (predictedIndex) => {
    const totalSlices = prizes.length;
    const sliceAngle = 360 / totalSlices;
  
    // Calculate the rotation to land on the predicted prize's center
    const rotationToWin = (predictedIndex * sliceAngle) + (sliceAngle / 2);
    
    // Return the total rotation needed (adding multiple spins)
    return rotationToWin + (360 * 5); // 5 full spins for effect
  };



const createPrizeNodes = () => {
    prizes.forEach((prize, i) => {
      const { text, color, reaction } = prize; // Destructure prize properties
      const rotation = ((prizeSlice * i) * -1) - prizeOffset;
  
      // Create the prize node
      const prizeNode = document.createElement('li');
      prizeNode.classList.add('prize');
      prizeNode.setAttribute('data-reaction', reaction);
      prizeNode.style.setProperty('--rotate', `${rotation}deg`);
  
      // Add the prize text
      const prizeText = document.createElement('span');
      prizeText.classList.add('text');
      prizeText.textContent = text;
  
      // Append the text to the prize node
      prizeNode.appendChild(prizeText);
  
      // Add the click event listener to the prize node
      prizeNode.addEventListener('click', () => {
        alert(`Position of "${text}": ${i}`); // Alert the position of the clicked prize
      });
  
      // Append the prize node to the spinner
      spinner.appendChild(prizeNode);
    });
  };

  // Color Gradient
  const createConicGradient = () => {
    spinner.setAttribute(
      "style",
      `background: conic-gradient(
        from -90deg,
        ${prizes
          .map(({ color }, i) => `${color} 0 ${(100 / prizes.length) * (prizes.length - i)}%`)
          .reverse()
        }
      );`
    );
  };
  
  // Setup the wheel
  const setupWheel = () => {
    createConicGradient();
    createPrizeNodes();
    prizeNodes = wheel.querySelectorAll(".prize");
  };
  
  // Speed of the wheel
  const spinertia = (min, max) => {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
  };
  
  const runTickerAnimation = () => {
    // https://css-tricks.com/get-value-of-css-rotation-through-javascript/
    const values = spinnerStyles.transform.split("(")[1].split(")")[0].split(",");
    const a = values[0];
    const b = values[1];  
    let rad = Math.atan2(b, a);
    
    if (rad < 0) rad += (2 * Math.PI);
    
    const angle = Math.round(rad * (180 / Math.PI));
    const slice = Math.floor(angle / prizeSlice);
  
    if (currentSlice !== slice) {
      ticker.style.animation = "none";
      setTimeout(() => ticker.style.animation = null, 10);
      currentSlice = slice;
    }
  
    tickerAnim = requestAnimationFrame(runTickerAnimation);
  };
  
const selectPrize = () => {
    const selected = Math.floor(rotation / prizeSlice) % prizes.length;
    prizeNodes[selected].classList.add(selectedClass);
    reaper.dataset.reaction = prizeNodes[selected].dataset.reaction;
  };

  trigger.addEventListener("click", () => {
    if (reaper.dataset.reaction !== "dancing") {
      reaper.dataset.reaction = "dancing";
    }
    
    trigger.disabled = true;
  
    // Change this index to the desired winner (e.g., 2 for "Ginebra San Miguel")
    const predictedIndex = predictedIndex_set_by_user; // Adjust this for your desired outcome
    const predictedRotation = predictWinner(predictedIndex);
    // Apply the calculated rotation
    rotation = predictedRotation;
  
    prizeNodes.forEach((prize) => prize.classList.remove(selectedClass));
    wheel.classList.add(spinClass);
    spinner.style.setProperty("--rotate", rotation);
    ticker.style.animation = "none";
    runTickerAnimation();
  });
  
  spinner.addEventListener("transitionend", () => {
    cancelAnimationFrame(tickerAnim);
    trigger.disabled = false;
    trigger.focus();
  
    // Normalize the rotation
    rotation %= 360;
    
    selectPrize(); // This will now accurately select the prize based on rotation
    wheel.classList.remove(spinClass);
    spinner.style.setProperty("--rotate", rotation);

    document.getElementById("key").value = '';
    document.getElementById("key").focus();
  });
  
  setupWheel();