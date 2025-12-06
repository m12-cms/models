#!/usr/bin/env node

const fs = require('fs');
const path = require('path');

if (!fs.existsSync('.git')) {
    console.log('No .git directory, skipping Husky hook setup');
    process.exit(0);
}

// Ensure .husky exists
if (!fs.existsSync('.husky')) {
    fs.mkdirSync('.husky');
}

// Create pre-commit hook
fs.writeFileSync(
    path.join('.husky', 'pre-commit'),
    `#!/bin/sh
. "$(dirname "$0")/_/husky.sh"

npx lint-staged
`
);

// Create commit-msg hook
fs.writeFileSync(
    path.join('.husky', 'commit-msg'),
    `#!/bin/sh
. "$(dirname "$0")/_/husky.sh"

npx commitlint --edit "$1"
`
);

// Make files executable
fs.chmodSync('.husky/pre-commit', 0o755);
fs.chmodSync('.husky/commit-msg', 0o755);

console.log('Husky hooks created');
