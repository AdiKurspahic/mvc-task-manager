<?php include "../views/partials/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="mb-4">Dodaj zadatak</h2>
                <form method="POST" action="index.php?controller=task&action=store" id="taskForm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Naslov</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Opis</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="due_date" class="form-label">Rok</label>
                            <input type="date" name="due_date" id="due_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Novo">Novo</option>
                                <option value="U toku">U toku</option>
                                <option value="Završeno">Završeno</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label">Kategorija</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Odaberi kategoriju</option>
                                <?php while($cat = $categories->fetch_assoc()): ?>
                                    <option value="<?= $cat["id"]; ?>"><?= htmlspecialchars($cat["name"]); ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Sačuvaj</button>
                        <a href="index.php?controller=task&action=index" class="btn btn-secondary">Nazad</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../views/partials/footer.php"; ?>