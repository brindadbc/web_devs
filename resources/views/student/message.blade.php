<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTOACADEMY - Chat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
        }
        
        .container {
            display: flex;
            height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .sidebar-logo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin-bottom: auto;
        }
        
        .sidebar-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .sidebar-menu-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #3498db;
        }
        
        .sidebar-menu-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-icon {
            margin-right: 12px;
            font-size: 18px;
        }
        
        .sidebar-profile {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .profile-avatar {
            width: 40px;
            height: 40px;
            background-color: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: bold;
        }
        
        .profile-name {
            font-weight: 600;
        }
        
        .profile-role {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Chat container */
        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        /* Chat header */
        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .chat-title {
            font-size: 20px;
            font-weight: 600;
        }
        
        .chat-header-actions {
            display: flex;
            align-items: center;
        }
        
        .notification-bell {
            font-size: 20px;
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -8px;
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Chat layout */
        .chat-layout {
            display: flex;
            height: calc(100% - 64px);
        }
        
        /* Chat contact list */
        .chat-contacts {
            width: 300px;
            background-color: white;
            border-right: 1px solid #e6e9ed;
            overflow-y: auto;
        }
        
        .chat-search {
            padding: 15px;
            border-bottom: 1px solid #e6e9ed;
        }
        
        .search-input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #e6e9ed;
            font-size: 14px;
            outline: none;
            background-color: #f5f7fa;
        }
        
        .search-input::placeholder {
            color: #a0a0a0;
        }
        
        .chat-contacts-filter {
            display: flex;
            padding: 10px 15px;
            border-bottom: 1px solid #e6e9ed;
        }
        
        .filter-btn {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            background: none;
            font-size: 14px;
            cursor: pointer;
            color: #7f8c8d;
            margin-right: 8px;
            transition: all 0.2s;
        }
        
        .filter-btn.active {
            background-color: #3498db;
            color: white;
        }
        
        .contact-item {
            display: flex;
            padding: 15px;
            border-bottom: 1px solid #f5f7fa;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .contact-item:hover, .contact-item.active {
            background-color: #f5f7fa;
        }
        
        .contact-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
            font-size: 16px;
        }
        
        .contact-details {
            flex: 1;
        }
        
        .contact-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .contact-name {
            font-weight: 600;
        }
        
        .contact-time {
            font-size: 12px;
            color: #95a5a6;
        }
        
        .contact-message {
            font-size: 14px;
            color: #7f8c8d;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 180px;
        }
        
        .contact-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }
        
        .status-unread {
            background-color: #3498db;
            color: white;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 10px;
        }
        
        .status-online {
            width: 8px;
            height: 8px;
            background-color: #2ecc71;
            border-radius: 50%;
        }
        
        /* Chat main area */
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f5f7fa;
        }
        
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        
        .message {
            display: flex;
            margin-bottom: 20px;
        }
        
        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
        }
        
        .message-content {
            flex: 1;
            max-width: 70%;
        }
        
        .message-bubble {
            background-color: white;
            padding: 12px 15px;
            border-radius: 18px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-size: 15px;
            margin-bottom: 5px;
        }
        
        .message-info {
            display: flex;
            font-size: 12px;
            color: #95a5a6;
        }
        
        .message.self {
            flex-direction: row-reverse;
        }
        
        .message.self .message-avatar {
            margin-right: 0;
            margin-left: 15px;
            background-color: #27ae60;
        }
        
        .message.self .message-bubble {
            background-color: #3498db;
            color: white;
            border-bottom-right-radius: 5px;
        }
        
        .message.self .message-info {
            justify-content: flex-end;
        }
        
        .message:not(.self) .message-bubble {
            border-bottom-left-radius: 5px;
        }
        
        /* Typing indicator */
        .typing-indicator {
            display: flex;
            padding: 10px;
            margin-bottom: 20px;
            align-items: center;
        }
        
        .typing-indicator span {
            width: 8px;
            height: 8px;
            background-color: #95a5a6;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            animation: typing 1s infinite ease-in-out;
        }
        
        .typing-indicator span:nth-child(1) {
            animation-delay: 0s;
        }
        
        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
            margin-right: 0;
        }
        
        @keyframes typing {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
        
        /* Chat input */
        .chat-input {
            padding: 15px 20px;
            background-color: white;
            border-top: 1px solid #e6e9ed;
        }
        
        .input-container {
            display: flex;
            align-items: center;
        }
        
        .input-actions {
            display: flex;
            margin-right: 15px;
        }
        
        .input-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.2s;
            font-size: 18px;
            color: #7f8c8d;
        }
        
        .input-icon:hover {
            background-color: #f5f7fa;
        }
        
        .message-input {
            flex: 1;
            padding: 12px 15px;
            border-radius: 20px;
            border: 1px solid #e6e9ed;
            font-size: 15px;
            outline: none;
            resize: none;
            max-height: 100px;
            overflow-y: auto;
        }
        
        .send-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            margin-left: 15px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.2s;
        }
        
        .send-btn:hover {
            background-color: #2980b9;
        }
        
        /* Chat info panel */
        .chat-info {
            width: 280px;
            background-color: white;
            border-left: 1px solid #e6e9ed;
            padding: 20px;
            overflow-y: auto;
        }
        
        .chat-info-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .info-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
            margin: 0 auto 15px;
        }
        
        .info-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .info-status {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            background-color: #2ecc71;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .info-actions {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        
        .info-action {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 8px;
            cursor: pointer;
            color: #7f8c8d;
            transition: background-color 0.2s;
        }
        
        .info-action:hover {
            background-color: #e6e9ed;
        }
        
        .info-section {
            margin-bottom: 25px;
        }
        
        .info-section-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #7f8c8d;
        }
        
        .info-list {
            list-style: none;
        }
        
        .info-list-item {
            display: flex;
            align-items: center;
            padding: 8px 0;
            font-size: 14px;
        }
        
        .info-list-icon {
            margin-right: 10px;
            color: #7f8c8d;
        }
        
        .shared-files {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .file-item {
            width: calc(50% - 5px);
            background-color: #f5f7fa;
            padding: 12px;
            border-radius: 8px;
            font-size: 12px;
        }
        
        .file-icon {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .file-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .file-size {
            color: #95a5a6;
        }
        
        /* Mobile responsive */
        @media (max-width: 992px) {
            .chat-info {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar-logo {
                font-size: 16px;
                padding: 15px 5px;
            }
            
            .sidebar-menu-item span,
            .profile-info {
                display: none;
            }
            
            .sidebar-menu-item {
                justify-content: center;
                padding: 12px;
            }
            
            .sidebar-icon {
                margin-right: 0;
            }
            
            .sidebar-profile {
                justify-content: center;
            }
            
            .chat-contacts {
                width: 250px;
            }
        }
        
        @media (max-width: 576px) {
            .chat-contacts {
                display: none;
            }
            
            .chat-container {
                width: calc(100% - 80px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">TUTOACADEMY</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">📊</div>
                    <span>Tableau de bord</span>
                </li>
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">📚</div>
                    <span>Mes cours</span>
                </li>
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">🧑‍🎓</div>
                    <span>Étudiants</span>
                </li>
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">📝</div>
                    <span>Devoirs</span>
                </li>
                <li class="sidebar-menu-item active">
                    <div class="sidebar-icon">💬</div>
                    <span>Messages</span>
                </li>
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">📊</div>
                    <span>Analyses</span>
                </li>
                <li class="sidebar-menu-item">
                    <div class="sidebar-icon">⚙️</div>
                    <span>Paramètres</span>
                </li>
            </ul>
            <div class="sidebar-profile">
                <div class="profile-avatar">PD</div>
                <div class="profile-info">
                    <div class="profile-name">Prof. Dupont</div>
                    <div class="profile-role">Enseignant</div>
                </div>
            </div>
        </div>
        
        <!-- Chat Container -->
        <div class="chat-container">
            <!-- Chat Header -->
            <div class="chat-header">
                <div class="chat-title">Messages</div>
                <div class="chat-header-actions">
                    <div class="notification-bell">
                        🔔
                        <div class="notification-badge">3</div>
                    </div>
                </div>
            </div>
            
            <!-- Chat Layout -->
            <div class="chat-layout">
                <!-- Chat Contacts -->
                <div class="chat-contacts">
                    <div class="chat-search">
                        <input type="text" class="search-input" placeholder="Rechercher...">
                    </div>
                    <div class="chat-contacts-filter">
                        <button class="filter-btn active">Tous</button>
                        <button class="filter-btn">Non lus</button>
                        <button class="filter-btn">Étudiants</button>
                    </div>
                    <div class="contact-item active">
                        <div class="contact-avatar">MR</div>
                        <div class="contact-details">
                            <div class="contact-header">
                                <div class="contact-name">Marie Robert</div>
                                <div class="contact-time">10:30</div>
                            </div>
                            <div class="contact-message">J'ai une question sur le devoir de React...</div>
                            <div class="contact-status">
                                <div class="status-online"></div>
                                <div class="status-unread">2</div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-avatar">TL</div>
                        <div class="contact-details">
                            <div class="contact-header">
                                <div class="contact-name">Thomas Leroux</div>
                                <div class="contact-time">Hier</div>
                            </div>
                            <div class="contact-message">Merci pour vos explications, c'est plus clair maintenant.</div>
                            <div class="contact-status">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-avatar">SB</div>
                        <div class="contact-details">
                            <div class="contact-header">
                                <div class="contact-name">Sophie Blanc</div>
                                <div class="contact-time">Hier</div>
                            </div>
                            <div class="contact-message">Est-ce que je peux avoir une extension pour le projet Figma?</div>
                            <div class="contact-status">
                                <div class="status-online"></div>
                                <div class="status-unread">1</div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-avatar">ND</div>
                        <div class="contact-details">
                            <div class="contact-header">
                                <div class="contact-name">Nicolas Dubois</div>
                                <div class="contact-time">3 avril</div>
                            </div>
                            <div class="contact-message">J'ai téléchargé tous les supports, merci!</div>
                            <div class="contact-status">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-avatar">LC</div>
                        <div class="contact-details">
                            <div class="contact-header">
                                <div class="contact-name">Lucas Clement</div>
                                <div class="contact-time">2 avril</div>
                            </div>
                            <div class="contact-message">Pouvez-vous me dire comment accéder à l'enregistrement du cours?</div>
                            <div class="contact-status">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Chat Main -->
                <div class="chat-main">
                    <div class="chat-messages">
                        <div class="message">
                            <div class="message-avatar">MR</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Bonjour Professeur Dupont, j'espère que vous allez bien. J'ai une question concernant le devoir React que vous nous avez assigné.
                                </div>
                                <div class="message-info">10:15</div>
                            </div>
                        </div>
                        
                        <div class="message">
                            <div class="message-avatar">MR</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Je n'arrive pas à comprendre comment utiliser les hooks pour gérer l'état dans le composant TodoList. Pourriez-vous me guider?
                                </div>
                                <div class="message-info">10:16</div>
                            </div>
                        </div>
                        
                        <div class="message self">
                            <div class="message-avatar">PD</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Bonjour Marie, bien sûr, je serai ravi de vous aider avec les hooks React.
                                </div>
                                <div class="message-info">10:20</div>
                            </div>
                        </div>
                        
                        <div class="message self">
                            <div class="message-avatar">PD</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Pour gérer l'état dans votre composant TodoList, vous devez utiliser le hook useState. Voici comment vous pourriez l'implémenter:
                                    <br><br>
                                    <code>
                                    const [todos, setTodos] = useState([]);<br>
                                    const [input, setInput] = useState('');
                                    </code>
                                    <br><br>
                                    Ensuite, pour ajouter un todo:
                                    <br><br>
                                    <code>
                                    const addTodo = () => {<br>
                                      &nbsp;&nbsp;if (input) {<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;setTodos([...todos, { id: Date.now(), text: input, completed: false }]);<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;setInput('');<br>
                                      &nbsp;&nbsp;}<br>
                                    };
                                    </code>
                                </div>
                                <div class="message-info">10:22</div>
                            </div>
                        </div>
                        
                        <div class="message">
                            <div class="message-avatar">MR</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Merci pour votre réponse rapide! Je comprends mieux maintenant. Et pour supprimer un todo, je dois utiliser filter, c'est ça?
                                </div>
                                <div class="message-info">10:28</div>
                            </div>
                        </div>
                        
                        <div class="message self">
                            <div class="message-avatar">PD</div>
                            <div class="message-content">
                                <div class="message-bubble">
                                    Exactement! Pour supprimer un todo, vous pouvez utiliser la méthode filter comme ceci:
                                    <br><br>
                                    <code>
                                    const deleteTodo = (id) => {<br>
                                      &nbsp;&nbsp;setTodos(todos.filter(todo => todo.id !== id));<br>
                                    };
                                    </code>
                                    <br><br>
                                    Et pour marquer un todo comme terminé:
                                    <br><br>
                                    <code>
                                    const toggleComplete = (id) => {<br>
                                      &nbsp;&nbsp;setTodos(todos.map(todo => {<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;if (todo.id === id) {<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return { ...todo, completed: !todo.completed };<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                                      &nbsp;&nbsp;&nbsp;&nbsp;return todo;<br>
                                      &nbsp;&nbsp;}));<br>
                                    };
                                    </code>
                                </div>
                                <div class="message-info">10:30</div>
                            </div>
                        </div>
                        
                        <div class="typing-indicator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    
                    <div class="chat-input">
                        <div class="input-container">
                            <div class="input-actions">
                                <div class="input-icon">📎</div>
                                <div class="input-icon">🖼️</div>
                                <div class="input-icon">😊</div>
                            </div>
                            <textarea class="message-input" placeholder="Écrivez un message..."></textarea>
                            <button class="send-btn">➤</button>
                        </div>
                    </div>
                </div>
                
                <!-- Chat Info -->
                <div class="chat-info">
                    <div class="chat-info-header">
                        <div class="info-avatar">MR</div>
                        <div class="info-name">Marie Robert</div>
                        <div class="info-status">
                            <div class="status-indicator"></div>
                            <span>En ligne</span>
                        </div>
                    </div>
                    
                    <div class="info-actions">
                        <div class="info-action">📞</div>
                        <div class="info-action">📹</div>
                        <div class="info-action">ℹ️</div>
                    </div>
                    
                    <div class="info-section">
                        <div class="info-section-title">INFORMATIONS</div>
                        <ul class="info-list">
                            <li class="info-list-item">
                                <div class="info-list-icon">📧</div>
                                <div>marie.r@example.com</div>
                            </li>
                            <li class="info-list-item">
                                <div class="info-list-icon">📚</div>
                                <div>Figma UI UX Design</div>
                            </li>
                            <li class="info-list-item">
                                <div class="info-list-icon">📋</div>
                                <div>Dernière activité: Aujourd'hui</div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="info-section">
                        <div class="info-section-title">FICHIERS PARTAGÉS</div>
                        <div class="shared-files">
                            <div class="file-item">
                                <div class="file-icon">📄</div>
                                <!-- Complétant la section des fichiers partagés qui s'est interrompue -->
                                <div class="file-name">Todo_App_Project.js</div>
                                <div class="file-size">15 Ko</div>
                            </div>
                            <div class="file-item">
                                <div class="file-icon">📄</div>
                                <div class="file-name">React_Hooks_Notes.pdf</div>
                                <div class="file-size">2.3 Mo</div>
                            </div>
                            <div class="file-item">
                                <div class="file-icon">🖼️</div>
                                <div class="file-name">Component_Structure.png</div>
                                <div class="file-size">450 Ko</div>
                            </div>
                            <div class="file-item">
                                <div class="file-icon">📄</div>
                                <div class="file-name">Assignment_Details.docx</div>
                                <div class="file-size">320 Ko</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-section">
                        <div class="info-section-title">ACTIONS</div>
                        <ul class="info-list">
                            <li class="info-list-item">
                                <div class="info-list-icon">🔕</div>
                                <div>Couper les notifications</div>
                            </li>
                            <li class="info-list-item">
                                <div class="info-list-icon">📌</div>
                                <div>Épingler la conversation</div>
                            </li>
                            <li class="info-list-item">
                                <div class="info-list-icon">🗑️</div>
                                <div>Supprimer la conversation</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script pour ajouter des fonctionnalités interactives
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des filtres de contacts
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Gestion des contacts
            const contactItems = document.querySelectorAll('.contact-item');
            contactItems.forEach(item => {
                item.addEventListener('click', function() {
                    contactItems.forEach(contact => contact.classList.remove('active'));
                    this.classList.add('active');
                    // Ici on pourrait charger la conversation correspondante
                });
            });

            // Envoi de message
            const messageInput = document.querySelector('.message-input');
            const sendButton = document.querySelector('.send-btn');
            
            function sendMessage() {
                const message = messageInput.value.trim();
                if (message) {
                    // Créer un nouveau message
                    const messageElement = document.createElement('div');
                    messageElement.className = 'message self';
                    
                    const now = new Date();
                    const timeString = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                    
                    messageElement.innerHTML = `
                        <div class="message-avatar">PD</div>
                        <div class="message-content">
                            <div class="message-bubble">${message.replace(/\n/g, '<br>')}</div>
                            <div class="message-info">${timeString}</div>
                        </div>
                    `;
                    
                    // Supprimer l'indicateur de frappe
                    const typingIndicator = document.querySelector('.typing-indicator');
                    if (typingIndicator) {
                        typingIndicator.remove();
                    }
                    
                    // Ajouter le message à la conversation
                    const chatMessages = document.querySelector('.chat-messages');
                    chatMessages.appendChild(messageElement);
                    
                    // Faire défiler vers le bas
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    
                    // Vider l'input
                    messageInput.value = '';
                }
            }
            
            sendButton.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            // Auto-resize du textarea
            messageInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight < 100) ? this.scrollHeight + 'px' : '100px';
            });

            // Simuler une réponse après un délai
            setTimeout(() => {
                const typingIndicator = document.querySelector('.typing-indicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                    
                    const messageElement = document.createElement('div');
                    messageElement.className = 'message';
                    messageElement.innerHTML = `
                        <div class="message-avatar">MR</div>
                        <div class="message-content">
                            <div class="message-bubble">
                                Merci beaucoup pour ces explications détaillées, c'est beaucoup plus clair maintenant! Je vais essayer d'implémenter ces fonctions dans mon projet. Si j'ai d'autres questions, je vous recontacterai.
                            </div>
                            <div class="message-info">10:33</div>
                        </div>
                    `;
                    
                    const chatMessages = document.querySelector('.chat-messages');
                    chatMessages.appendChild(messageElement);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            }, 5000);
        });
    </script>
</body>
</html>