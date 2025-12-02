<style>
    :root {
        --primary: #fea116;
        /* Cam vàng */
        --primary-dark: #d98a12;
        /* Cam đậm */
        --dark: #0f172b;
        /* Xanh đen */
        --white: #ffffff;
        --text-main: #1e293b;
        --text-sub: #64748b;
        --bg-light: #f8f9fa;

        --shadow-card: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
        --radius: 8px;
        --anim-fast: 0.2s ease;
    }

    body {
        font-family: 'Nunito', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-main);
    }

    h2,
    h3,
    h4,
    h5,
    strong,
    .font-heading {
        font-family: 'Heebo', sans-serif;
    }

    /* --- HEADER SECTION --- */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: nowrap;
        margin-bottom: 20px;
        gap: 10px;
    }

    .page-header span.text-muted {
        flex-shrink: 0;
    }

    .header-title {
        color: var(--dark);
        font-weight: 800;
        font-size: 1.8rem;
        text-transform: uppercase;
        flex-shrink: 1;
    }


    /* --- INFO BOX (Context Order) --- */
    .context-box {
        background: var(--white);
        border-radius: var(--radius);
        padding: 15px 20px;
        border-left: 4px solid var(--primary);
        box-shadow: var(--shadow-card);
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .context-item {
        display: flex;
        flex-direction: column;
    }

    .context-label {
        font-size: 0.75rem;
        color: var(--text-sub);
        font-weight: 700;
        text-transform: uppercase;
    }

    .context-value {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        font-family: 'Heebo';
    }

    /* --- COMBO CARD --- */
    .combo-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid #f1f5f9;
        box-shadow: var(--shadow-card);
        transition: var(--anim-fast);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .combo-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: rgba(254, 161, 22, 0.4);
    }

    /* Image Area */
    .img-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .combo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .combo-card:hover .combo-img {
        transform: scale(1.05);
    }

    .price-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(15, 23, 43, 0.9);
        /* Dark background */
        color: var(--primary);
        padding: 5px 12px;
        border-radius: 4px;
        font-family: 'Heebo';
        font-weight: 800;
        font-size: 1.1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Card Body */
    .card-body-custom {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .combo-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
        font-family: 'Heebo';
        line-height: 1.2;
    }

    .combo-desc-label {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-sub);
        margin-bottom: 8px;
        display: block;
    }

    /* List Items */
    .menu-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
        flex: 1;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px dashed #f1f5f9;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .item-thumb {
        width: 40px;
        height: 40px;
        border-radius: 6px;
        object-fit: cover;
        border: 1px solid #e2e8f0;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .item-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-main);
        flex: 1;
    }

    .item-qty {
        background: #f1f5f9;
        color: var(--text-sub);
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    /* Button */
    .btn-select {
        width: 100%;
        border: none;
        padding: 12px;
        border-radius: 6px;
        font-weight: 800;
        text-transform: uppercase;
        font-family: 'Heebo', sans-serif;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--anim-fast);
        background: var(--primary);
        color: var(--white);
        box-shadow: 0 4px 10px rgba(254, 161, 22, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-select:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .btn-back {
        flex-shrink: 0;
        background: #e2e8f0;
        color: var(--text-sub);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: 0.2s;
    }

    .btn-back:hover {
        background: #cbd5e1;
        color: var(--dark);
    }

    /* Button ± tròn */
    .btn-increase,
    .btn-decrease {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        background-color: #f8f9fa;
        font-weight: 800;
        font-size: 1.2rem;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-increase:hover,
    .btn-decrease:hover {
        background-color: var(--primary);
        color: var(--white);
        transform: scale(1.1);
    }

    /* Input số lượng */
    .combo-qty {
        text-align: center;
        font-weight: 700;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        transition: transform 0.15s ease;
    }

    /* Animation khi thay đổi số lượng */
    .combo-qty.animate {
        transform: scale(1.2);
    }

    .filter-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filter-menu a {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid var(--primary);
        color: var(--primary);
        background: var(--white);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .filter-menu a:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    .filter-menu a.active {
        background: var(--primary);
        color: var(--white);
        box-shadow: 0 4px 12px rgba(254, 161, 22, 0.3);
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-content {
        background: #fff;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        position: relative;
        padding: 20px;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .modal-img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .modal-title {
        font-weight: 800;
        font-size: 1.3rem;
        margin-bottom: 5px;
    }

    .modal-price {
        font-weight: 700;
        color: #fea116;
        margin-bottom: 10px;
    }

    .modal-desc {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 10px;
    }

    .modal-qty {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 10px;
    }

    .combo-card.disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 1.4rem;
        }
    }
</style>
