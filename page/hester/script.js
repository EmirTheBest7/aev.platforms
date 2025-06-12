let userMessage = null,
  isResponseGenerating = false;

// Global conversation history
let conversationHistory = [];

// Load conversation history from localStorage (if available)
const loadConversationHistory = () => {
  const savedHistory = localStorage.getItem("conversationHistory");
  if (savedHistory) {
    conversationHistory = JSON.parse(savedHistory);
  }
};

// Save conversation history to localStorage
const saveConversationHistory = () => {
  localStorage.setItem("conversationHistory", JSON.stringify(conversationHistory));
};

const typingForm = document.querySelector(".typing-form"),
  chatList = document.querySelector(".chat-list"),
  toggleThemeButton = document.getElementById("toggle-theme-button"),
  deleteChatButton = document.getElementById("delete-chat-button"),
  suggestions = document.querySelectorAll(".suggestion-list .suggestion"),
  API_KEY = "AIzaSyArssjkfyMCF9JiH_gQtLTNkBvQIHDHcs8",
  API_URL = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-lite:generateContent?key=${API_KEY}`,
  createMessageElement = (content, ...classes) => {
    const div = document.createElement("div");
    div.classList.add("message", ...classes);
    div.innerHTML = content;
    return div;
  },

  showTypingEffect = (text, textElement, incomingMessageDiv) => {
    let currentWordIndex = 0;
    const words = text.split(" ");
    textElement.innerText = "";
    const icon = incomingMessageDiv.querySelector(".icon");
    icon.classList.add("hide");
    isResponseGenerating = true;
    const addNextWord = () => {
      if (currentWordIndex < words.length) {
        textElement.innerText += (currentWordIndex === 0 ? "" : " ") + words[currentWordIndex++];
        setTimeout(addNextWord, 75);
        localStorage.setItem("savedChats", chatList.innerHTML);
      } else {
        icon.classList.remove("hide");
        isResponseGenerating = false;
      }
      chatList.scrollTo(0, chatList.scrollHeight);
    };
    addNextWord();
  },

  generateAPIResponse = async (incomingMessageDiv) => {
    const textElement = incomingMessageDiv.querySelector(".text");
    try {
      const response = await fetch(API_URL, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          // Send the full conversation history for context
          contents: conversationHistory
        })
      });
      const data = await response.json();
      if (!response.ok) throw new Error(data.error.message);
      let apiResponse = data?.candidates[0].content.parts[0].text.replace(/\*\*(.*?)\*\*/g, "$1");
      apiResponse = apiResponse.replace(/Gemini/g, "HesterGPT");
      apiResponse = apiResponse.replace(/Google/g, "Λ L I Ξ V Platforms");

      // Add the assistant's response to the conversation history and persist it
      conversationHistory.push({
        role: "assistant",
        parts: [{ text: apiResponse }]
      });
      saveConversationHistory();

      showTypingEffect(apiResponse, textElement, incomingMessageDiv);
    } catch (error) {
      isResponseGenerating = false;
      let errorMessage;
      switch (error.message) {
        case 'NetworkError when attempting to fetch resource.':
          errorMessage = 'Network error: Please check your internet connection.';
          break;
        case 'API key not valid. Please pass a valid API key.':
          errorMessage = 'Invalid API key: Please use a valid API key.';
          break;
        default:
          errorMessage = error.message.includes('developers.google.com')
            ? 'Error: Please check the documentation at api.aliev.io for more details.'
            : 'An unexpected error occurred. Please try again later.';
      }
      textElement.innerText = errorMessage;
      textElement.classList.add("error");
    } finally {
      incomingMessageDiv.classList.remove("loading");
    }
  },

  showLoadingAnimation = () => {
    const html = `<div class="message-content">
      <img src="https://aliev.io/page/main/img/hester.jpeg" alt="HesterGPT Image" class="avatar">
      <p class="text"></p>
      <div class="loading-indicator">
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
        <div class="loading-bar"></div>
      </div>
    </div>
    <i onclick="copyMessage(this)" class="fa-regular fa-copy icon"></i>`;
    const incomingMessageDiv = createMessageElement(html, "incoming", "loading");
    chatList.appendChild(incomingMessageDiv);
    chatList.scrollTo(0, chatList.scrollHeight);
    generateAPIResponse(incomingMessageDiv);
  },

  copyMessage = (copyIcon) => {
    const messageText = copyIcon.parentElement.querySelector(".text").innerText;
    navigator.clipboard
      .writeText(messageText)
      .then(() => {
        const icon = copyIcon;
        if (icon) {
          icon.classList.remove("fa-copy");
          icon.classList.add("fa-circle-check");
        } else {
          copyIcon.innerHTML = `<i class="fa-regular fa-circle-check"></i>`;
        }
        setTimeout(() => {
          if (icon) {
            icon.classList.remove("fa-circle-check");
            icon.classList.add("fa-copy");
          } else {
            copyIcon.innerHTML = `<i class="fa-regular fa-copy icon"></i>`;
          }
        }, 1000);
      })
      .catch((err) => {
        console.error(err);
      });
  },

  handelOutgoingChat = () => {
    userMessage = typingForm.querySelector(".typing-input").value.trim() || userMessage;
    if (!userMessage || isResponseGenerating) return;
    isResponseGenerating = true;

    // Add the user's message to the conversation history and update localStorage
    conversationHistory.push({
      role: "user",
      parts: [{ text: userMessage }]
    });
    saveConversationHistory();

    const html = `<div class="message-content">
      <img src="https://aliev.io/_assets/images/avatar.png" alt="User Image" class="avatar">
      <p class="text"></p>
    </div>`;
    const outgoingMessageDiv = createMessageElement(html, "outgoing");
    outgoingMessageDiv.querySelector(".text").innerText = userMessage;
    chatList.appendChild(outgoingMessageDiv);
    typingForm.reset();
    chatList.scrollTo(0, chatList.scrollHeight);
    document.body.classList.add("hide-header");
    setTimeout(showLoadingAnimation, 500);
  };

suggestions.forEach((suggestion) => {
  suggestion.addEventListener("click", () => {
    userMessage = suggestion.querySelector(".text").innerText;
    handelOutgoingChat();
  });
});

toggleThemeButton.addEventListener("click", (event) => {
  const isLightMode = document.body.classList.toggle("light-mode");
  const icon = event.currentTarget;
  if (isLightMode) {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  } else {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
  }
  localStorage.setItem("theme-color", isLightMode ? "light" : "dark");
});

deleteChatButton.addEventListener("click", () => {
  if (confirm("Are you sure you want to delete all messages?")) {
    localStorage.removeItem("savedChats");
    localStorage.removeItem("conversationHistory");
    conversationHistory = [];
    const chatList = document.querySelector(".chat-list");
    if (chatList) {
      chatList.innerHTML = "";
    }
    loadLocalstorageData();
  }
});
    
typingForm.addEventListener("submit", (e) => {
  e.preventDefault();
  handelOutgoingChat();
});

const loadLocalstorageData = () => {
  const savedTheme = localStorage.getItem("theme-color");
  const savedChats = localStorage.getItem("savedChats");
  if (savedTheme === "light") {
    document.body.classList.add("light-mode");
    if (toggleThemeButton) {
      toggleThemeButton.classList.remove("fa-sun");
      toggleThemeButton.classList.add("fa-moon");
    }
  } else {
    document.body.classList.remove("light-mode");
    if (toggleThemeButton) {
      toggleThemeButton.classList.remove("fa-moon");
      toggleThemeButton.classList.add("fa-sun");
    }
  }
  const chatList = document.querySelector(".chat-list");
  if (chatList) {
    chatList.innerHTML = savedChats || "";
    document.body.classList.toggle("hide-header", !!savedChats);
    chatList.scrollTo({ top: chatList.scrollHeight, behavior: "smooth" });
  }
};

// Load saved chats and conversation history on page load
loadLocalstorageData();
loadConversationHistory();

$('select[data-menu]').each(function () {
  let select = $(this),
    options = select.find("option"),
    menu = $("<div />").addClass("select-menu"),
    button = $("<div />").addClass("button"),
    list = $("<ul />"),
    arrow = $("<em />").prependTo(button);

  options.each(function (i) {
    let option = $(this);
    list.append($("<li />").text(option.text()));
  });

  menu.css("--t", select.find(":selected").index() * -41 + "px");
  select.wrap(menu);
  button.append(list).insertAfter(select);
  list.clone().insertAfter(button);
});

$(document).on("click", ".select-menu", function (e) {
  let menu = $(this);
  if (!menu.hasClass("open")) {
    menu.addClass("open");
  }
});

$(document).on("click", ".select-menu > ul > li", function (e) {
  let li = $(this),
    menu = li.parent().parent(),
    select = menu.children("select"),
    selected = select.find("option:selected"),
    index = li.index();

  menu.css("--t", index * -41 + "px");
  selected.attr("selected", false);
  select.find("option").eq(index).attr("selected", true);
  menu.addClass(index > selected.index() ? "tilt-down" : "tilt-up");

  setTimeout(() => {
    menu.removeClass("open tilt-up tilt-down");
  }, 500);
});

$(document).click((e) => {
  e.stopPropagation();
  if ($(".select-menu").has(e.target).length === 0) {
    $(".select-menu").removeClass("open");
  }
});

async function init () {
    const node = document.querySelector("#type-text")
    
    await sleep(1000)
    node.innerText = ""
    await node.type('Hello, ')
    
    while (true) {
      await node.type("Friend!");
      await sleep(2000);
      await node.delete("Friend!");
  
      await node.type("User!");
      await sleep(2000);
      await node.delete("User!");
  
      await node.type("Explorer!");
      await sleep(2000);
      await node.delete("Explorer!");
  
      await node.type("Creator!");
      await sleep(2000);
      await node.delete("Creator!");
  
      await node.type("Adventurer!");
      await sleep(2000);
      await node.delete("Adventurer!");
  
      await node.type("Innovator!");
      await sleep(2000);
      await node.delete("Innovator!");
  
      await node.type("Learner!");
      await sleep(2000);
      await node.delete("Learner!");
  
      await node.type("Visionary!");
      await sleep(2000);
      await node.delete("Visionary!");
  
      await node.type("Achiever!");
      await sleep(2000);
      await node.delete("Achiever!");
  
      await node.type("Enthusiast!");
      await sleep(2000);
      await node.delete("Enthusiast!");
    }
}

// Source code 🚩

const sleep = time => new Promise(resolve => setTimeout(resolve, time));

class TypeAsync extends HTMLSpanElement {
  get typeInterval() {
    const randomMs = 100 * Math.random();
    return randomMs < 50 ? 10 : randomMs;
  }
  
  async type(text) {
    for (let character of text) {
      this.innerText += character;
      await sleep(this.typeInterval);
    }
  }
  
  async delete(text) {
    for (let character of text) {
      this.innerText = this.innerText.slice(0, this.innerText.length - 1);
      await sleep(this.typeInterval);
    }
  }
}

customElements.define("type-async", TypeAsync, { extends: "span" });

if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('./_assets/js/service-worker.js')
    .then(reg => console.log('Service Worker registered!', reg))
    .catch(err => console.error('Service Worker failed', err));
}


init(); 
