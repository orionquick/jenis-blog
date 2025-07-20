<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeni's Blog - Thoughts, Stories & Ideas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            color: #ffffff;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(30px);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #ff6b6b 50%, #4ecdc4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            border: none;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
        }

        /* Posts Section */
        .posts-section {
            padding: 5rem 0;
            background: rgba(255, 255, 255, 0.02);
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #ffffff, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .post-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .post-image {
            height: 200px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
            position: relative;
            overflow: hidden;
        }

        .post-content {
            padding: 2rem;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #4ecdc4;
            margin-bottom: 0.5rem;
        }

        .post-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .post-excerpt {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
        }

        .read-more {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            color: #4ecdc4;
        }

        /* Post Modal */
        .post-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }

        .post-modal.active {
            display: flex;
        }

        .post-content-modal {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            max-width: 800px;
            width: 90%;
            max-height: 90%;
            overflow-y: auto;
            padding: 3rem;
            margin: 2rem;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .post-content-modal h1 {
            color: #ff6b6b;
            margin-bottom: 1rem;
        }

        .post-content-modal h2 {
            color: #4ecdc4;
            margin: 2rem 0 1rem 0;
        }

        .post-content-modal p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .post-content-modal img {
            max-width: 100%;
            border-radius: 10px;
            margin: 1rem 0;
        }

        /* About Section */
        .about {
            padding: 5rem 0;
            text-align: center;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .about h2 {
            font-size: 3rem;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, #ff6b6b, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 3rem 0;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .post-content-modal {
                padding: 2rem;
                margin: 1rem;
            }
        }

        /* Loading animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f0f23, #1a1a2e);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-top: 3px solid #ff6b6b;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .empty-state h3 {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">Jeni's Blog</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#posts">Posts</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="mailto:hello@jeni.blog">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Welcome to Jeni's Blog</h1>
            <p>Discover stories, insights, and ideas that inspire and transform</p>
            <button class="cta-button" onclick="scrollToSection('posts')">Explore Posts</button>
        </div>
    </section>

    <!-- Posts Section -->
    <section class="posts-section" id="posts">
        <div class="container">
            <h2 class="section-title">Latest Posts</h2>
            <div class="posts-grid" id="posts-grid">
                <?php
                // Get all .md files from posts directory
                $postsDir = 'posts/';
                $posts = [];
                
                if (is_dir($postsDir)) {
                    $files = glob($postsDir . '*.md');
                    
                    foreach ($files as $file) {
                        $content = file_get_contents($file);
                        $post = parseMarkdownPost($content, basename($file));
                        if ($post) {
                            $posts[] = $post;
                        }
                    }
                    
                    // Sort by date (newest first)
                    usort($posts, function($a, $b) {
                        return strtotime($b['date']) - strtotime($a['date']);
                    });
                }
                
                function parseMarkdownPost($content, $filename) {
                    // Extract frontmatter
                    if (!preg_match('/^---\n(.*?)\n---\n(.*)$/s', $content, $matches)) {
                        return null;
                    }
                    
                    $frontmatter = $matches[1];
                    $body = trim($matches[2]);
                    
                    // Parse frontmatter
                    $metadata = [];
                    foreach (explode("\n", $frontmatter) as $line) {
                        if (strpos($line, ':') !== false) {
                            list($key, $value) = explode(':', $line, 2);
                            $key = trim($key);
                            $value = trim($value, ' "\'');
                            $metadata[$key] = $value;
                        }
                    }
                    
                    $metadata['body'] = $body;
                    $metadata['filename'] = $filename;
                    $metadata['slug'] = preg_replace('/^\d{4}-\d{2}-\d{2}-/', '', preg_replace('/\.md$/', '', $filename));
                    
                    return $metadata;
                }
                
                function formatDate($dateString) {
                    return date('F j, Y', strtotime($dateString));
                }
                
                if (empty($posts)): ?>
                    <div class="empty-state">
                        <h3>No posts found</h3>
                        <p>Add your markdown files to the /posts/ folder to get started.</p>
                        <p style="color: rgba(255, 255, 255, 0.4); font-size: 0.9rem;">Files should be named: YYYY-MM-DD-post-title.md</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <article class="post-card" onclick="openPost(<?php echo htmlspecialchars(json_encode($post)); ?>)">
                            <div class="post-image"></div>
                            <div class="post-content">
                                <div class="post-meta"><?php echo formatDate($post['date']); ?></div>
                                <h3 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h3>
                                <p class="post-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                <a href="#" class="read-more" onclick="event.stopPropagation(); openPost(<?php echo htmlspecialchars(json_encode($post)); ?>)">Read More →</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <h2>About Jeni</h2>
                <p>Welcome to my digital sanctuary where thoughts meet words and ideas take flight. I'm passionate about sharing stories that matter, insights that inspire, and perspectives that challenge the ordinary.</p>
                <p>Through this blog, I invite you to join me on a journey of discovery, creativity, and meaningful connection. Every post is crafted with intention and care, designed to spark conversation and inspire reflection.</p>
            </div>
        </div>
    </section>

    <!-- Post Modal -->
    <div class="post-modal" id="post-modal">
        <div class="post-content-modal">
            <button class="close-modal" onclick="closePost()">×</button>
            <div id="modal-content">
                <!-- Post content loaded here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <p>&copy; 2025 Jeni's Blog. All rights reserved.</p>
                    <p>Made with ❤️ and lots of coffee</p>
                </div>
                <div class="social-links">
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="Instagram">📷</a>
                    <a href="#" title="LinkedIn">💼</a>
                    <a href="mailto:hello@jeni.blog" title="Email">✉️</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Loading animation
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
            }, 1000);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Open post modal
        function openPost(post) {
            const modalContent = document.getElementById('modal-content');
            modalContent.innerHTML = `
                <div class="post-meta">${formatDate(post.date)}</div>
                <h1>${post.title}</h1>
                ${markdownToHtml(post.body)}
            `;

            document.getElementById('post-modal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close post modal
        function closePost() {
            document.getElementById('post-modal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        // Convert markdown to HTML
        function markdownToHtml(markdown) {
            return markdown
                .replace(/^### (.*$)/gim, '<h3>$1</h3>')
                .replace(/^## (.*$)/gim, '<h2>$1</h2>')
                .replace(/^# (.*$)/gim, '<h1>$1</h1>')
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                .replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>')
                .replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">')
                .replace(/\n\n/g, '</p><p>')
                .replace(/^/, '<p>')
                .replace(/$/, '</p>');
        }

        // Close modal on outside click
        document.getElementById('post-modal').addEventListener('click', (e) => {
            if (e.target.id === 'post-modal') {
                closePost();
            }
        });

        // Navigation click handlers
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    scrollToSection(targetId);
                }
            });
        });
    </script>
</body>
</html>
