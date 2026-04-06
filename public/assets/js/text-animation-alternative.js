// Alternative: Typing effect animation
// Pour utiliser cette version, remplacez le code dans main.js

function initTypingEffect() {
    const texts = [
        'On connecte.',
        'On construit.',
        'On sécurise.'
    ];
    
    const colors = [
        'var(--primary)',
        'var(--accent)',
        'var(--secondary)'
    ];
    
    const wrapper = document.querySelector('.animated-text-wrapper');
    if (!wrapper) return;
    
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let currentText = '';
    
    function type() {
        const fullText = texts[textIndex];
        
        if (isDeleting) {
            currentText = fullText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            currentText = fullText.substring(0, charIndex + 1);
            charIndex++;
        }
        
        wrapper.innerHTML = `<span style="color: ${colors[textIndex]}">${currentText}</span>`;
        
        let typeSpeed = 100;
        
        if (isDeleting) {
            typeSpeed = 50;
        }
        
        if (!isDeleting && charIndex === fullText.length) {
            typeSpeed = 2000; // Pause at end
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typeSpeed = 500; // Pause before next word
        }
        
        setTimeout(type, typeSpeed);
    }
    
    // Start typing effect
    type();
}

// Pour activer cette animation, appelez cette fonction au lieu de initAnimatedText()
// initTypingEffect();
