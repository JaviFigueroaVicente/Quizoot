<template>
    <div class="mt-7 mb-6">
        <div class="container my-2">
            <div class="row">
                <!-- Imagen Decorativa -->
                <div class="col-md-4 d-flex flex-column align-items-center left-section">
                    <img src="/images/forms/disney.jpg" alt="User image" class="img-fluid form-image">
                    <h3 class="fw-bold mt-3">Disney Form</h3>
                    <p>Esta es la descripción del formulario para que los usuarios puedan ver de qué va.</p>
                </div>

                <!-- Ranking Grande a la Derecha -->
                <div class="col-md-8 ranking-container">
                    <h3 class="ranking-title">🏆 Top Players</h3>

                    <!-- Lista de Ranking Desplazable -->
                    <div class="ranking-list-container">
                        <ul class="ranking-list">
                            <li v-for="(player, index) in players" :key="index" class="ranking-item">
                                <span class="ranking-position" :class="getPositionClass(player.rank)">
                                    {{ player.rank }}
                                </span>
                                <span class="ranking-name">{{ player.name }}</span>
                                <span class="ranking-score">{{ player.score }} pts</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            players: []
        };
    },
    methods: {
        getPositionClass(rank) {
            if (rank === 1) return "gold";
            if (rank === 2) return "silver";
            if (rank === 3) return "bronze";
            return "";
        },
        generatePlayers() {
            let points = 100;
            for (let i = 1; i <= 50; i++) {
                this.players.push({
                    rank: i,
                    name: `Player ${i}`,
                    score: points
                });
                points--;
            }
        }
    },
    created() {
        this.generatePlayers();
    }
};
</script>

<style scoped>
.left-section {
    position: sticky;
    top: 20px;
    height: calc(100vh - 20px);
    text-align: center;
}

.form-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
}

.ranking-container {
    background: #874eca;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
    text-align: center;
    height: 600px;
    display: flex;
    flex-direction: column;
}

.ranking-list-container {
    max-height: 500px;
    overflow-y: auto;
    padding-right: 15px;
}

.ranking-list-container::-webkit-scrollbar {
    width: 10px;
}

.ranking-list-container::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 5px;
}

.ranking-list-container::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255, 255, 255, 0.7);
}

.ranking-title {
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 15px;
}

.ranking-list {
    list-style: none;
    padding: 0;
}

.ranking-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.ranking-item:last-child {
    border-bottom: none;
}

.ranking-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
}

.ranking-position {
    font-size: 22px;
    font-weight: bold;
    flex-shrink: 0;
    width: 40px;
    text-align: center;
}

.gold {
    color: #FFD700;
}

.silver {
    color: #C0C0C0;
}

.bronze {
    color: #CD7F32;
}

.ranking-name {
    flex-grow: 1;
    text-align: left;
    padding-left: 10px;
}

.ranking-score {
    font-weight: bold;
    font-size: 18px;
    color: #ffffff;
    flex-shrink: 0;
    text-align: right;
}

@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .left-section {
        position: relative; /* Evita que quede fija */
        height: auto;
        margin-bottom: 20px;
    }

    .ranking-container {
        height: auto; /* Permite que crezca según el contenido */
        padding: 15px;
        margin-top: 20px;
    }

    .ranking-list-container {
        max-height: 320px; /* Evita que sea demasiado larga */
        overflow-y: auto; /* Permite desplazamiento */
    }
}

</style>