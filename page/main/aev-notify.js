// if the pen is in thumbnail view, scale it up
if (location.pathname.match(/fullcpgrid/i) ? true : false) {
    document.documentElement.style.fontSize = "32px"
    document.querySelector(".aev-notifications").style.transform = "translate(0.5rem, calc(-50% + 3rem))"
  }
  
  
  class Notifications {
    constructor(el) {
      this.el = el
    }
    
    // function to create new elements with a class (cleans up code)
    createDiv(className = "") {
      const el = document.createElement("div")
      el.classList.add(className)
      return el
    }
    // function to add text nodes to elements
    addText(el, text) {
      el.appendChild(document.createTextNode(text))
    }
    
    create(
      title = "Untitled notification",
      description = "",
      duration = 2,
      destroyOnClick = true,
      clickFunction = undefined
    ) {
      
      // functions
      function destroy(animate) {
        if (animate) {
          notiEl.classList.add("out")
          notiEl.addEventListener("animationend", () => {notiEl.remove()})
        } else {
          notiEl.remove()
        }
      }
      
      // create the elements and add their content
      const notiEl = this.createDiv("noti")
      const notiCardEl = this.createDiv("noticard")
      const glowEl = this.createDiv("notiglow")
      const borderEl = this.createDiv("notiborderglow")
      
      const titleEl = this.createDiv("notititle")
      this.addText(titleEl, title)
      
      const descriptionEl = this.createDiv("notidesc")
      this.addText(descriptionEl, description)
      
      // append the elements to each other
      notiEl.appendChild(notiCardEl)
      notiCardEl.appendChild(glowEl)
      notiCardEl.appendChild(borderEl)
      notiCardEl.appendChild(titleEl)
      notiCardEl.appendChild(descriptionEl)
      
      this.el.appendChild(notiEl)
      
      // transition the height of the container to the height of the visible card
      console.log("height", notiCardEl.scrollHeight)
      requestAnimationFrame(function() {
        notiEl.style.height = "calc(0.25rem + " + notiCardEl.getBoundingClientRect().height + "px)";
      });
  
      // hover animation
      notiEl.addEventListener("mousemove", (event) => {
        const rect = notiCardEl.getBoundingClientRect()
        const localX = (event.clientX - rect.left) / rect.width
        const localY = (event.clientY - rect.top) / rect.height
  
        console.log(localX, localY)
        glowEl.style.left = localX * 100 + "%"
        glowEl.style.top = localY * 100 + "%"
  
        borderEl.style.left = localX * 100 + "%"
        borderEl.style.top = localY * 100 + "%"
      });
      
      // onclick function if one is set
      if (clickFunction != undefined) {
        notiEl.addEventListener("click", clickFunction)
      }
      
      // destroy the notification on click if it is set to do so
      if (destroyOnClick) {
        notiEl.addEventListener("click", () => destroy(true))
      }
      
      
      // remove the notification after the set time if there is one
      if (duration != 0) {
        setTimeout(() => {
          notiEl.classList.add("out")
          notiEl.addEventListener("animationend", () => {notiEl.remove()})
        }, duration * 1000)
      }
      return notiEl
    }
  }
  
  // demo
  notis = new Notifications(document.querySelector(".aev-notifications"))
  
  const demonotis = [
    () => {notis.create("Neon notifications", "wow, these notifications really do look beautiful", 5)},
    () => {notis.create("Hover effects", "and the hover effects make it even better!", 5)},
    () => {notis.create("Ease of use", "on top of that, you can easily add this to any project", 10)},
    () => {notis.create("Customisation", "you can even customise the duration and add actions on click", 10)},
    () => {notis.create("Click me", "try clicking this for a surprise!", 5, true, () => notis.create("Surprise", "Wow, you clicked the previous notification,", 4))},
    () => {notis.create("Animations", "all the animations stay smooth even when notifications disappear out of order or when multiple appear at once", 15)},
  ]
  let i = 1;
  demonotis[0]()
  setInterval(()=>{
    if (i == demonotis.length) {
      notis.create("Final!", "click on this notification to restart the demo or go look at the code if you're interested", 0, true, () => {i = 0})
    } else if (i < demonotis.length) {
      demonotis[i]()
    }
    i++
  }, 4000)
  
  /*
  How to use:
  
  create the notification object using new Notifications and pass it the notification wrapper element
  ex: const notis = new Notifications(document.querySelector(".aev-notifications"))
  
  make notifications by using notis.create() (or *.create() if you names it something else)
  
  notis.create() parameters:
    Title: string,
    Description: string,
    Duration: seconds (default 2s, 0 makes it stay forever),
    Destroy on click: boolean
      (determines if the notification should disappear when clicked, default: false)
    Click function: function
      (gets called when the notification is clicked if it isnt undefined, default: undefined)
  */