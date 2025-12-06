import { mkdirSync, writeFileSync, existsSync } from "fs";

const hooks = {
    "pre-commit": `#!/bin/sh
. "$(dirname "$0")/_/husky.sh"

sh ./docker-hooks/pre-commit.sh
`,

    "pre-push": `#!/bin/sh
. "$(dirname "$0")/_/husky.sh"

sh ./docker-hooks/pre-push.sh
`
};

// Ensure .husky exists
if (!existsSync(".husky")) {
    mkdirSync(".husky", { recursive: true });
}

// Save hooks
for (const [name, content] of Object.entries(hooks)) {
    writeFileSync(`.husky/${name}`, content, { mode: 0o755 });
}

console.log("Husky hooks installed.");
