<!-- Best Sellers Section -->
<?php
include './components/pages/home/best-sellers.php';
?>

<!-- Image Gallery Section -->
<div class="image-gallery">
    <img src="./assets/images/gallery-1.jpg" alt="Gallery Image 1">
    <img src="./assets/images/gallery-2.jpg" alt="Gallery Image 2">
    <img src="./assets/images/gallery-3.jpg" alt="Gallery Image 3">
    <img src="./assets/images/gallery-4.jpg" alt="Gallery Image 4">
    <img src="./assets/images/gallery-5.jpg" alt="Gallery Image 5">
</div>



css

/* Image Gallery Styles */
.image-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
    padding: 10px;
}

.image-gallery img {
    flex: 1 1 180px; /* Flex basis of 180px with the ability to grow and shrink */
    max-width: 100%; /* Ensures the image is fully responsive and scales down if needed */
    height: auto;
    border-radius: 8px; /* Optional: Adds rounded corners to images */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Optional: Adds subtle shadows for better depth */
}

@media (max-width: 768px) {
    .image-gallery {
        flex-direction: column;
    }
}
