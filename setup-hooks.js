#!/usr/bin/env node
const fs = require("fs");
const path = require("path");

if (!fs.existsSync(".git")) {
    console.log("No .git directory found — skipping Husky hook setup.");
    process.exit(0);
}

if (!fs.existsSync(".husky")) {
    fs.mkdirSync(".husky", { recursive: true });
}

// pre-commit: lint-staged (pint on changed php files)
const preCommit = `#!/usr/bin/env sh
npx --no-install lint-staged
`;
fs.writeFileSync(path.join(".husky", "pre-commit"), preCommit, { mode: 0o755 });

// commit-msg: validate commit message with commitlint
const commitMsg = `#!/usr/bin/env sh
npx --no-install commitlint --edit "$1"
`;
fs.writeFileSync(path.join(".husky", "commit-msg"), commitMsg, { mode: 0o755 });

// pre-push: heavy checks - phpstan, pint --test, phpunit
const prePush = `#!/usr/bin/env sh
# Run fast checks first
echo "→ Running Pint (test mode)"
vendor/bin/pint --test || { echo "Pint failed"; exit 1; }

echo "→ Running PHPStan"
vendor/bin/phpstan analyse --memory-limit=1G || { echo "PHPStan failed"; exit 1; }

echo "→ Running PHPUnit"
vendor/bin/phpunit --testdox || { echo "PHPUnit failed"; exit 1; }

exit 0
`;
fs.writeFileSync(path.join(".husky", "pre-push"), prePush, { mode: 0o755 });

console.log("Husky hooks created: .husky/{pre-commit,commit-msg,pre-push}");
