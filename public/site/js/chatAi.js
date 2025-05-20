// const API_KEY = ""

// document.addEventListener("DOMContentLoaded", function () {
//   function getFullPageText() {
//     const header = document.querySelector("header");
//     const footer = document.querySelector("footer");

//     const originalHeaderDisplay = header?.style.display;
//     const originalFooterDisplay = footer?.style.display;

//     if (header) header.style.display = "none";
//     if (footer) footer.style.display = "none";

//     const text = document.body.innerText.trim().replace(/\s+/g, " ");

//     if (header) header.style.display = originalHeaderDisplay || "";
//     if (footer) footer.style.display = originalFooterDisplay || "";

//     return text;
//   }

//   const pageContent = getFullPageText();

//   const chatHistory = [
//     {
//       role: "system",
//       content: `
//         Bạn là một AI quản lý website 'Tiệm bánh thông minh', thân thiện và chuyên nghiệp.
//         Nhiệm vụ của bạn là giúp người dùng chọn ra các sản phẩm bánh phù hợp nhất với nhu cầu, sở thích và dịp sử dụng (như sinh nhật, lễ kỷ niệm, quà tặng...).
//         Bạn có kiến thức sâu về các loại bánh, nguyên liệu, mức giá, đánh giá khách hàng và có thể đưa ra lời khuyên tốt nhất để người dùng đưa ra quyết định mua hàng.
//         Ngoài ra, bạn cũng có thể gợi ý các chương trình khuyến mãi, combo ưu đãi và hỗ trợ người dùng trong quá trình đặt hàng.
//         Dưới đây là nội dung trang web mà người dùng đang xem:
//         """${pageContent}"""
//         Bạn hãy sử dụng thông tin trên để tư vấn chính xác nhất, đừng trả lời dài dòng quá và tránh những câu hỏi không liên quan nhé.
//       `.trim(),
//     },
//   ];

//   const chatBubble = document.getElementById("chatBubble");
//   const sendMessageAi = document.getElementById("sendMessageAi");
//   const closeChatAi = document.getElementById("closeChatAi");

//   chatBubble.onclick = toggleChat;
//   closeChatAi.onclick = toggleChat;

//   function toggleChat() {
//     const chatContainer = document.getElementById("chatContainer");
//     const chatBubble = document.getElementById("chatBubble");
//     if (
//       chatContainer.style.display === "none" ||
//       !chatContainer.style.display
//     ) {
//       chatContainer.style.display = "flex";
//       chatBubble.style.display = "none";
//     } else {
//       chatContainer.style.display = "none";
//       chatBubble.style.display = "flex";
//     }
//   }

//   function messageUi(message, isUser, tempId = null) {
//     const chatBody = document.getElementById("chatBody");
//     const messageDiv = document.createElement("div");
//     messageDiv.className = `message ${isUser ? "user-message" : "bot-message"}`;
//     if (tempId) messageDiv.id = tempId;
//     messageDiv.innerText = message;
//     chatBody.appendChild(messageDiv);
//     chatBody.scrollTop = chatBody.scrollHeight;
//   }

//   async function sendMessage() {
//     const inputField = document.getElementById("userInput");
//     const input = inputField.value.trim();
//     if (!input) return;

//     messageUi(input, true);
//     chatHistory.push({ role: "user", content: input });
//     inputField.value = "";

//     const tempId = "stream-message-" + Date.now();
//     messageUi("", false, tempId);

//     try {
//       const res = await fetch("https://api.openai.com/v1/chat/completions", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/json",
//           Authorization: `Bearer ${API_KEY}`,
//         },
//         body: JSON.stringify({
//           model: "gpt-4",
//           messages: chatHistory.slice(-8),
//           stream: true,
//         }),
//       });

//       if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);

//       const reader = res.body.getReader();
//       const decoder = new TextDecoder("utf-8");
//       let resultText = "";
//       const tempMessage = document.getElementById(tempId);

//       while (true) {
//         const { done, value } = await reader.read();
//         if (done) break;
//         const chunk = decoder.decode(value, { stream: true });

//         const lines = chunk
//           .split("\n")
//           .filter((line) => line.trim().startsWith("data: "));

//         for (const line of lines) {
//           const jsonStr = line.replace(/^data:\s*/, "");
//           if (jsonStr === "[DONE]") break;
//           try {
//             const json = JSON.parse(jsonStr);
//             const content = json.choices?.[0]?.delta?.content;
//             if (content) {
//               resultText += content;
//               if (tempMessage) tempMessage.innerText = resultText;
//             }
//           } catch (err) {
//             console.error("JSON parse error:", err);
//           }
//         }
//       }

//       chatHistory.push({ role: "assistant", content: resultText });
//     } catch (error) {
//       const tempMessage = document.getElementById(tempId);
//       if (tempMessage) {
//         tempMessage.innerText = "Đã xảy ra lỗi: " + error.message;
//       }
//     }
//   }

//   sendMessageAi.addEventListener("click", sendMessage);
//   document.getElementById("userInput").addEventListener("keypress", (e) => {
//     if (e.key === "Enter") sendMessage();
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  function getFullPageText() {
    const header = document.querySelector("header");
    const footer = document.querySelector("footer");

    const originalHeaderDisplay = header?.style.display;
    const originalFooterDisplay = footer?.style.display;

    if (header) header.style.display = "none";
    if (footer) footer.style.display = "none";

    const text = document.body.innerText.trim().replace(/\s+/g, " ");

    if (header) header.style.display = originalHeaderDisplay || "";
    if (footer) footer.style.display = originalFooterDisplay || "";

    return text;
  }

  const pageContent = getFullPageText();

  const chatHistory = [
    {
      role: "system",
      content: `
        Bạn là một AI quản lý website 'Tiệm bánh thông minh', thân thiện và chuyên nghiệp.
        Nhiệm vụ của bạn là giúp người dùng chọn ra các sản phẩm bánh phù hợp nhất với nhu cầu, sở thích và dịp sử dụng (như sinh nhật, lễ kỷ niệm, quà tặng...).
        Bạn có kiến thức sâu về các loại bánh, nguyên liệu, mức giá, đánh giá khách hàng và có thể đưa ra lời khuyên tốt nhất để người dùng đưa ra quyết định mua hàng.
        Ngoài ra, bạn cũng có thể gợi ý các chương trình khuyến mãi, combo ưu đãi và hỗ trợ người dùng trong quá trình đặt hàng.
        Dưới đây là nội dung trang web mà người dùng đang xem:
        """${pageContent}"""
        Bạn hãy sử dụng thông tin trên để tư vấn chính xác nhất, đừng trả lời dài dòng quá và tránh những câu hỏi không liên quan nhé.
      `.trim(),
    },
  ];

  const chatBubble = document.getElementById("chatBubble");
  const sendMessageAi = document.getElementById("sendMessageAi");
  const closeChatAi = document.getElementById("closeChatAi");

  chatBubble.onclick = toggleChat;
  closeChatAi.onclick = toggleChat;

  function toggleChat() {
    const chatContainer = document.getElementById("chatContainer");
    const chatBubble = document.getElementById("chatBubble");
    if (
      chatContainer.style.display === "none" ||
      !chatContainer.style.display
    ) {
      chatContainer.style.display = "flex";
      chatBubble.style.display = "none";
    } else {
      chatContainer.style.display = "none";
      chatBubble.style.display = "flex";
    }
  }

  function messageUi(message, isUser, tempId = null) {
    const chatBody = document.getElementById("chatBody");
    const messageDiv = document.createElement("div");
    messageDiv.className = `message ${isUser ? "user-message" : "bot-message"}`;
    if (tempId) messageDiv.id = tempId;
    messageDiv.innerText = message;
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
  }

  async function getApiKey() {
    const res = await fetch("api/get-key.php");
    if (!res.ok) throw new Error("Không thể lấy API key");
    return res.text();
  }

  async function sendMessage() {
    const inputField = document.getElementById("userInput");
    const input = inputField.value.trim();
    if (!input) return;

    messageUi(input, true);
    chatHistory.push({ role: "user", content: input });
    inputField.value = "";

    const tempId = "stream-message-" + Date.now();
    messageUi("", false, tempId);

    try {
      const res = await fetch("api/chat.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          messages: chatHistory.slice(-8),
        }),
      });

      if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);

      const reader = res.body.getReader();
      const decoder = new TextDecoder("utf-8");
      let resultText = "";
      const tempMessage = document.getElementById(tempId);

      while (true) {
        const { done, value } = await reader.read();
        if (done) break;
        const chunk = decoder.decode(value, { stream: true });

        const lines = chunk
          .split("\n")
          .filter((line) => line.trim().startsWith("data: "));

        for (const line of lines) {
          const jsonStr = line.replace(/^data:\s*/, "");
          if (jsonStr === "[DONE]") break;
          try {
            const json = JSON.parse(jsonStr);
            const content = json.choices?.[0]?.delta?.content;
            if (content) {
              resultText += content;
              if (tempMessage) tempMessage.innerText = resultText;
            }
          } catch (err) {
            console.error("JSON parse error:", err);
          }
        }
      }

      chatHistory.push({ role: "assistant", content: resultText });
    } catch (error) {
      const tempMessage = document.getElementById(tempId);
      if (tempMessage) {
        tempMessage.innerText = "Đã xảy ra lỗi: " + error.message;
      }
    }
  }

  sendMessageAi.addEventListener("click", sendMessage);
  document.getElementById("userInput").addEventListener("keypress", (e) => {
    if (e.key === "Enter") sendMessage();
  });
});
