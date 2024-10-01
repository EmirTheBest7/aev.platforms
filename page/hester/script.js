let userMessage = null,
  isResponseGenerating = false;
const typingForm = document.querySelector(".typing-form"),
  chatList = document.querySelector(".chat-list"),
  toggleThemeButton = document.getElementById("toggle-theme-button"),
  deleteChatButton = document.getElementById("delete-chat-button"),
  suggestions = document.querySelectorAll(".suggestion-list .suggestion"),
  API_KEY = "AIzaSyArssjkfyMCF9JiH_gQtLTNkBvQIHDHcs8", //Replace here Your API_KEY
  API_URL = `https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=${API_KEY}`,
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
        textElement.innerText +=
          (currentWordIndex === 0 ? "" : " ") + words[currentWordIndex++];
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
          contents: [
            {
              role: "user",
              parts: [{ text: userMessage }]
            }
          ]
        })
      });
      const data = await response.json();
      if (!response.ok) throw new Error(data.error.message);
      let apiResponse = data?.candidates[0].content.parts[0].text.replace(
        /\*\*(.*?)\*\*/g,
        "$1"
      );
      apiResponse = apiResponse.replace(/Gemini/g, "HesterGPT");
      apiResponse = apiResponse.replace(/Google/g, "Λ L I Ξ V Platforms");
      showTypingEffect(apiResponse, textElement, incomingMessageDiv);
    } catch (error) {
      isResponseGenerating = false;
      textElement.innerText = error.message;
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
        <i onclick=copyMessage(this) class="fa-regular fa-copy icon"></i>`;
    const incomingMessageDiv = createMessageElement(
      html,
      "incoming",
      "loading"
    );
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
    userMessage =
      typingForm.querySelector(".typing-input").value.trim() || userMessage;
    if (!userMessage || isResponseGenerating) return;
    isResponseGenerating = true;
    const html = ` <div class="message-content">
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
loadLocalstorageData();
