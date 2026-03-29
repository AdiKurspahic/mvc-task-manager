<?php include "../views/partials/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="mb-4">Uredi zadatak</h2>
                <form method="POST" action="index.php?controller=task&action=update" id="taskForm">
                    <input type="hidden" name="id" value="<?= $task["id"]; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Naslov</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($task["title"]); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Opis</label>
                        <textarea name="description" id="description" class="form-control" rows="4"><?= htmlspecialchars($task["description"]); ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="due_date" class="form-label">Rok</label>
                            <input type="date" name="due_date" id="due_date" class="form-control" value="<?= htmlspecialchars($task["due_date"]); ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Novo" <?= $task["status"] === "Novo" ? "selected" : ""; ?>>Novo</option>
                                <option value="U toku" <?= $task["status"] === "U toku" ? "selected" : ""; ?>>U toku</option>
                                <option value="Završeno" <?= $task["status"] === "Završeno" ? "selected" : ""; ?>>Završeno</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label">Kategorija</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Odaberi kategoriju</option>
                                <?php while($cat = $categories->fetch_assoc()): ?>
                                    <option value="<?= $cat["id"]; ?>" <?= $task["category_id"] == $cat["id"] ? "selected" : ""; ?>><?= htmlspecialchars($cat["name"]); ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Sačuvaj izmjene</button>
                        <a href="index.php?controller=task&action=index" class="btn btn-secondary">Nazad</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../views/partials/footer.php"; ?>