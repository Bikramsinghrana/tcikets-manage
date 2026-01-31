<!-- AI Chatbot Component -->
<div id="ai-chatbot">
    <!-- Chat Toggle Button -->
    <button class="chatbot-toggle" id="chatbotToggle" title="Chat with AI Assistant">
        <i class="fas fa-robot" id="chatbotIconOpen"></i>
        <i class="fas fa-times" id="chatbotIconClose" style="display: none;"></i>
        <span class="chatbot-pulse"></span>
    </button>

    <!-- Chat Window -->
    <div class="chatbot-window" id="chatbotWindow">
        <!-- Chat Header -->
        <div class="chatbot-header">
            <div class="chatbot-header-info">
                <div class="chatbot-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="chatbot-header-text">
                    <h6>AI Assistant</h6>
                    <span class="chatbot-status">
                        <span class="status-dot"></span>
                        Online
                    </span>
                </div>
            </div>
            <button class="chatbot-minimize" id="chatbotMinimize">
                <i class="fas fa-minus"></i>
            </button>
        </div>

        <!-- Chat Messages -->
        <div class="chatbot-messages" id="chatbotMessages">
            <!-- Welcome Message -->
            <div class="chat-message bot-message">
                <div class="message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="message-content">
                    <p>Hello! 👋 I'm your AI assistant for the Ticket Management System. I can help you with:</p>
                    <ul>
                        <li>Creating and managing tickets</li>
                        <li>Understanding ticket statuses</li>
                        <li>Finding information about categories</li>
                        <li>General navigation help</li>
                    </ul>
                    <p>How can I assist you today?</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="chatbot-quick-actions" id="chatbotQuickActions">
            <button class="quick-action-btn" data-message="How do I create a new ticket?">
                <i class="fas fa-ticket-alt"></i> Create Ticket
            </button>
            <button class="quick-action-btn" data-message="What are the different ticket statuses?">
                <i class="fas fa-info-circle"></i> Ticket Status
            </button>
            <button class="quick-action-btn" data-message="How do I track my tickets?">
                <i class="fas fa-search"></i> Track Tickets
            </button>
        </div>

        <!-- Chat Input -->
        <div class="chatbot-input-area">
            <form id="chatbotForm">
                <div class="input-wrapper">
                    <input 
                        type="text" 
                        id="chatbotInput" 
                        placeholder="Type your message..." 
                        autocomplete="off"
                    >
                    <button type="submit" class="send-btn" id="chatbotSend">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
            <div class="chatbot-footer">
                <span>Powered by AI</span>
            </div>
        </div>
    </div>
</div>

<style>
/* Chatbot Container */
#ai-chatbot {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* Toggle Button */
.chatbot-toggle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(99, 102, 241, 0.5);
}

.chatbot-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(99, 102, 241, 0.4);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

/* Chat Window */
.chatbot-window {
    position: absolute;
    bottom: 80px;
    right: 0;
    width: 380px;
    height: 520px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    display: none;
    flex-direction: column;
    overflow: hidden;
    animation: slideUp 0.3s ease;
}

.chatbot-window.active {
    display: flex;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Chat Header */
.chatbot-header {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    padding: 16px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chatbot-header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    width: 42px;
    height: 42px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
}

.chatbot-header-text h6 {
    margin: 0;
    color: white;
    font-weight: 600;
    font-size: 16px;
}

.chatbot-status {
    display: flex;
    align-items: center;
    gap: 6px;
    color: rgba(255, 255, 255, 0.9);
    font-size: 12px;
}

.status-dot {
    width: 8px;
    height: 8px;
    background: #10b981;
    border-radius: 50%;
    animation: blink 2s infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.chatbot-minimize {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.2s;
}

.chatbot-minimize:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* Messages Area */
.chatbot-messages {
    flex: 1;
    padding: 16px;
    overflow-y: auto;
    background: #f8fafc;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: transparent;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

/* Chat Messages */
.chat-message {
    display: flex;
    gap: 10px;
    max-width: 90%;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.bot-message {
    align-self: flex-start;
}

.user-message {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.message-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 14px;
}

.bot-message .message-avatar {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    color: white;
}

.user-message .message-avatar {
    background: #e2e8f0;
    color: #64748b;
}

.message-content {
    background: white;
    padding: 12px 16px;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.bot-message .message-content {
    border-bottom-left-radius: 4px;
}

.user-message .message-content {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    color: white;
    border-bottom-right-radius: 4px;
}

.message-content p {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

.message-content p + p {
    margin-top: 8px;
}

.message-content ul {
    margin: 8px 0;
    padding-left: 20px;
    font-size: 13px;
}

.message-content ul li {
    margin-bottom: 4px;
}

/* Typing Indicator */
.typing-indicator {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 8px 12px;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: #94a3b8;
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

/* Quick Actions */
.chatbot-quick-actions {
    padding: 8px 16px;
    background: white;
    border-top: 1px solid #e2e8f0;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.quick-action-btn {
    padding: 6px 12px;
    background: #f1f5f9;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    font-size: 12px;
    color: #475569;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 6px;
}

.quick-action-btn:hover {
    background: #6366f1;
    color: white;
    border-color: #6366f1;
}

.quick-action-btn i {
    font-size: 11px;
}

/* Input Area */
.chatbot-input-area {
    padding: 12px 16px;
    background: white;
    border-top: 1px solid #e2e8f0;
}

.input-wrapper {
    display: flex;
    gap: 8px;
    background: #f1f5f9;
    border-radius: 25px;
    padding: 4px 4px 4px 16px;
    align-items: center;
}

#chatbotInput {
    flex: 1;
    border: none;
    background: transparent;
    padding: 10px 0;
    font-size: 14px;
    outline: none;
    color: #1e293b;
}

#chatbotInput::placeholder {
    color: #94a3b8;
}

.send-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    border: none;
    color: white;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.send-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
}

.send-btn:disabled {
    background: #cbd5e1;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.chatbot-footer {
    text-align: center;
    margin-top: 8px;
    font-size: 11px;
    color: #94a3b8;
}

/* Responsive */
@media (max-width: 480px) {
    .chatbot-window {
        width: calc(100vw - 32px);
        height: calc(100vh - 120px);
        bottom: 70px;
        right: -8px;
    }
    
    #ai-chatbot {
        bottom: 16px;
        right: 16px;
    }
    
    .chatbot-toggle {
        width: 54px;
        height: 54px;
        font-size: 20px;
    }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatbotToggle = document.getElementById('chatbotToggle');
        const chatbotWindow = document.getElementById('chatbotWindow');
        const chatbotMinimize = document.getElementById('chatbotMinimize');
        const chatbotForm = document.getElementById('chatbotForm');
        const chatbotInput = document.getElementById('chatbotInput');
        const chatbotMessages = document.getElementById('chatbotMessages');
        const chatbotIconOpen = document.getElementById('chatbotIconOpen');
        const chatbotIconClose = document.getElementById('chatbotIconClose');
        const quickActionBtns = document.querySelectorAll('.quick-action-btn');
        const chatbotQuickActions = document.getElementById('chatbotQuickActions');
        
        let isOpen = false;

        // Toggle chat window
        chatbotToggle.addEventListener('click', function() {
            isOpen = !isOpen;
            chatbotWindow.classList.toggle('active', isOpen);
            chatbotIconOpen.style.display = isOpen ? 'none' : 'block';
            chatbotIconClose.style.display = isOpen ? 'block' : 'none';
            
            if (isOpen) {
                chatbotInput.focus();
            }
        });

        // Minimize chat
        chatbotMinimize.addEventListener('click', function() {
            isOpen = false;
            chatbotWindow.classList.remove('active');
            chatbotIconOpen.style.display = 'block';
            chatbotIconClose.style.display = 'none';
        });

        // Quick action buttons
        quickActionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const message = this.getAttribute('data-message');
                sendMessage(message);
                // Hide quick actions after first use
                chatbotQuickActions.style.display = 'none';
            });
        });

        // Form submit
        chatbotForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = chatbotInput.value.trim();
            if (message) {
                sendMessage(message);
                chatbotInput.value = '';
                // Hide quick actions after first message
                chatbotQuickActions.style.display = 'none';
            }
        });

        function sendMessage(message) {
            // Add user message
            addMessage(message, 'user');
            
            // Show typing indicator
            showTypingIndicator();
            
            // Simulate AI response
            setTimeout(() => {
                removeTypingIndicator();
                const response = getAIResponse(message);
                addMessage(response, 'bot');
            }, 1000 + Math.random() * 1000);
        }

        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${sender}-message`;
            
            const avatarIcon = sender === 'bot' ? 'fa-robot' : 'fa-user';
            
            messageDiv.innerHTML = `
                <div class="message-avatar">
                    <i class="fas ${avatarIcon}"></i>
                </div>
                <div class="message-content">
                    <p>${text}</p>
                </div>
            `;
            
            chatbotMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'chat-message bot-message';
            typingDiv.id = 'typingIndicator';
            typingDiv.innerHTML = `
                <div class="message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="message-content">
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            `;
            chatbotMessages.appendChild(typingDiv);
            scrollToBottom();
        }

        function removeTypingIndicator() {
            const typing = document.getElementById('typingIndicator');
            if (typing) {
                typing.remove();
            }
        }

        function scrollToBottom() {
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }

        function getAIResponse(message) {
            const lowerMessage = message.toLowerCase();
            
            // Knowledge base for ticket management system
            const responses = {
                'create': {
                    keywords: ['create', 'new ticket', 'submit', 'open ticket', 'raise'],
                    response: 'To create a new ticket:<br><br>1. Click on <strong>"Tickets"</strong> in the sidebar<br>2. Click the <strong>"Create New Ticket"</strong> button<br>3. Fill in the title, description, and select a category<br>4. Add any attachments if needed<br>5. Click <strong>"Submit"</strong><br><br>Your ticket will be assigned to an available developer!'
                },
                'status': {
                    keywords: ['status', 'statuses', 'state', 'progress'],
                    response: 'Ticket statuses in our system:<br><br>🆕 <strong>Open</strong> - Newly created, awaiting assignment<br>🔄 <strong>In Progress</strong> - Being worked on by a developer<br>⏸️ <strong>On Hold</strong> - Temporarily paused<br>✅ <strong>Resolved</strong> - Solution provided<br>❌ <strong>Closed</strong> - Completed and verified'
                },
                'track': {
                    keywords: ['track', 'find', 'search', 'my tickets', 'view'],
                    response: 'To track your tickets:<br><br>1. Go to <strong>"My Tickets"</strong> in the sidebar<br>2. Use filters to narrow down by status or category<br>3. Click on any ticket to see full details and comments<br><br>You\'ll receive notifications when your ticket status changes!'
                },
                'priority': {
                    keywords: ['priority', 'urgent', 'important', 'critical'],
                    response: 'Ticket priorities help us manage workload:<br><br>🔴 <strong>Critical</strong> - System down, immediate attention<br>🟠 <strong>High</strong> - Major issue affecting work<br>🟡 <strong>Medium</strong> - Important but not blocking<br>🟢 <strong>Low</strong> - Minor issues or enhancements'
                },
                'category': {
                    keywords: ['category', 'categories', 'type', 'department'],
                    response: 'Categories help route tickets to the right team. When creating a ticket, select the category that best matches your issue. Common categories include:<br><br>• Technical Support<br>• Bug Report<br>• Feature Request<br>• General Inquiry'
                },
                'comment': {
                    keywords: ['comment', 'reply', 'respond', 'message', 'update'],
                    response: 'To add a comment to a ticket:<br><br>1. Open the ticket details page<br>2. Scroll to the comments section<br>3. Type your message in the text box<br>4. Click <strong>"Add Comment"</strong><br><br>All parties will be notified of new comments!'
                },
                'attachment': {
                    keywords: ['attachment', 'file', 'upload', 'image', 'document'],
                    response: 'You can attach files to tickets:<br><br>• Supported formats: Images, PDFs, documents<br>• Maximum file size: 10MB<br>• Add attachments when creating or editing a ticket<br>• Screenshots help developers understand issues faster!'
                },
                'notification': {
                    keywords: ['notification', 'alert', 'notify', 'email'],
                    response: 'Notifications keep you updated:<br><br>🔔 <strong>In-app</strong> - Bell icon in the top navbar<br>📧 <strong>Email</strong> - Sent for important updates<br><br>You\'ll be notified when:<br>• Your ticket status changes<br>• Someone comments on your ticket<br>• A ticket is assigned to you'
                },
                'help': {
                    keywords: ['help', 'support', 'assist', 'how'],
                    response: 'I\'m here to help! Here are some things I can assist with:<br><br>• Creating and managing tickets<br>• Understanding ticket statuses and priorities<br>• Navigating the system<br>• Finding information<br><br>Just ask me anything about the Ticket Management System!'
                },
                'greeting': {
                    keywords: ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'good evening'],
                    response: 'Hello! 👋 Great to see you! I\'m your AI assistant for the Ticket Management System. How can I help you today?'
                },
                'thanks': {
                    keywords: ['thank', 'thanks', 'appreciate', 'helpful'],
                    response: 'You\'re welcome! 😊 I\'m glad I could help. Feel free to ask if you have any more questions about the Ticket Management System!'
                }
            };

            // Find matching response
            for (const key in responses) {
                const entry = responses[key];
                if (entry.keywords.some(keyword => lowerMessage.includes(keyword))) {
                    return entry.response;
                }
            }

            // Default response
            return 'I understand you\'re asking about: "' + message + '"<br><br>I can help you with:<br>• Creating tickets<br>• Tracking ticket status<br>• Understanding priorities<br>• Navigation help<br><br>Could you please rephrase your question or select one of these topics?';
        }
    });
</script>
