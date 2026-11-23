# Graph Report - invoke-communication-game  (2026-11-23)

## Corpus Check
- 95 files · ~21,012 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 22 file(s) not represented in the graph (top: (none) 17, .example 1, .neon 1)

## Summary
- 617 nodes · 959 edges · 42 communities (24 shown, 18 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 29 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `c69a0d7d`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- LeaderboardModal.vue
- package.json
- Answer
- GameFlowTest.php
- Illuminate\Database\Schema\Blueprint
- Board.vue
- types/game.ts
- with
- compilerOptions
- lib/game.ts
- AppServiceProvider.php
- ResultModal.vue
- scripts
- global.d.ts
- SymphonyBoard.php
- require-dev
- updates
- composer.json
- vue
- useBoardArrangement
- ImagePickerModal.vue
- config
- Pest.php
- require
- psr-4
- DatabaseSeeder.php
- extra
- pnpm-workspace.yaml

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 28 edges
2. `compilerOptions` - 19 edges
3. `Answer` - 15 edges
4. `Arrangement` - 15 edges
5. `vue` - 14 edges
6. `Player` - 13 edges
7. `scripts` - 13 edges
8. `require-dev` - 12 edges
9. `playAs()` - 11 edges
10. `@inertiajs/vue3` - 10 edges

## Surprising Connections (you probably didn't know these)
- `playAs()` --references--> `Player`  [EXTRACTED]
  tests/Feature/GameFlowTest.php → app/Models/Player.php
- `{closure#2}()` --references--> `Arrangement`  [EXTRACTED]
  app/Http/Middleware/HandleInertiaRequests.php → app/Models/Arrangement.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts
- `AnswerController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/AnswerController.php → app/Http/Controllers/Controller.php
- `ArrangementController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/ArrangementController.php → app/Http/Controllers/Controller.php

## Import Cycles
- None detected.

## Communities (42 total, 18 thin omitted)

### Community 0 - "SymphonyBoard"
Cohesion: 0.05
Nodes (16): AnswerController, ArrangementController, BoardController, Controller, GameController, PlayerController, EnsurePlayerSession, {closure#1}() (+8 more)

### Community 1 - "LeaderboardModal.vue"
Cohesion: 0.06
Nodes (41): clsx@^2.1.1, clsx, activate(), deactivate(), emit, isMounted, onKeydown(), panel (+33 more)

### Community 2 - "package.json"
Cohesion: 0.05
Nodes (52): dependencies, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11, typescript@^5.2.2 (+44 more)

### Community 3 - "Answer"
Cohesion: 0.06
Nodes (8): {closure#2}(), Answer, Arrangement, Player, User, AnswerFactory, PlayerFactory, UserFactory

### Community 4 - "GameFlowTest.php"
Cohesion: 0.09
Nodes (25): ArrangementFactory, {closure#10}(), {closure#11}(), {closure#12}(), {closure#13}(), {closure#14}(), {closure#15}(), {closure#16}() (+17 more)

### Community 5 - "Illuminate\Database\Schema\Blueprint"
Cohesion: 0.10
Nodes (11): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+3 more)

### Community 6 - "Board.vue"
Cohesion: 0.07
Nodes (18): imageMap(), board, edgeScroll, imagesById, isLocked, isResultOpen, isSubmitting, lightboxImage (+10 more)

### Community 7 - "types/game.ts"
Cohesion: 0.11
Nodes (10): @inertiajs/vue3@^3.0.0, @inertiajs/vue3, answer, ArrangementResult, BoardSection, ColumnTone, Group, GroupCard (+2 more)

### Community 8 - "with"
Cohesion: 0.10
Nodes (20): runs-on, steps, jobs, ci, name, on, pull_request, push (+12 more)

### Community 9 - "compilerOptions"
Cohesion: 0.10
Nodes (20): compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules, jsx, jsxImportSource, lib (+12 more)

### Community 10 - "lib/game.ts"
Cohesion: 0.17
Nodes (11): emit, emit, list, onAdd(), props, emit, emit, colourKey (+3 more)

### Community 12 - "ResultModal.vue"
Cohesion: 0.18
Nodes (12): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+4 more)

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "global.d.ts"
Cohesion: 0.19
Nodes (11): Auth, User, LeaderboardEntry, ComponentCustomProperties, GlobalDirectives, ImportMeta, ImportMetaEnv, InertiaConfig (+3 more)

### Community 16 - "require-dev"
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, larastan/larastan, laravel/boost, laravel/pail, laravel/pao, laravel/pint, laravel/sail (+4 more)

### Community 17 - "updates"
Cohesion: 0.17
Nodes (11): default-days, patterns, github-actions, interval, updates, cooldown, directory, groups (+3 more)

### Community 18 - "composer.json"
Cohesion: 0.18
Nodes (10): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, Tests\\ (+2 more)

### Community 19 - "vue"
Cohesion: 0.31
Nodes (8): vue, useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick(), *.vue

### Community 20 - "useBoardArrangement"
Cohesion: 0.29
Nodes (7): TRAY, useBoardArrangement(), place(), removeFromTray(), reset(), slotOf(), shuffle()

### Community 21 - "ImagePickerModal.vue"
Cohesion: 0.32
Nodes (7): confirm(), emit, onKeydown(), props, selected, step(), track

### Community 22 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 24 - "require"
Cohesion: 0.33
Nodes (6): require, inertiajs/inertia-laravel, laravel/framework, laravel/tinker, laravel/wayfinder, php

### Community 25 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 30 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

## Knowledge Gaps
- **18 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `vue` to `LeaderboardModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `ResultModal.vue`, `global.d.ts`, `useBoardArrangement`, `ImagePickerModal.vue`?**
  _High betweenness centrality (0.044) - this node is a cross-community bridge._
- **Should `SymphonyBoard` be split into smaller, more focused modules?**
  _Cohesion score 0.05160662122687439 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `Answer`, `AppServiceProvider.php`, `GameFlowTest.php`, `SymphonyBoard.php`?**
  _High betweenness centrality (0.039) - this node is a cross-community bridge._
- **Should `LeaderboardModal.vue` be split into smaller, more focused modules?**
  _Cohesion score 0.05589225589225589 - nodes in this community are weakly interconnected._
- **Why does `Answer` connect `Answer` to `SymphonyBoard`, `GameFlowTest.php`?**
  _High betweenness centrality (0.019) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.053109713487071976 - nodes in this community are weakly interconnected._
- **Should `Answer` be split into smaller, more focused modules?**
  _Cohesion score 0.06458635703918723 - nodes in this community are weakly interconnected._