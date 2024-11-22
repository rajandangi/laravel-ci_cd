<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Continuous Integration in Laravel
Continuous integration (CI) using GitHub Actions in a Laravel application.

## Key Concepts
1. **GitHub Actions Configuration**
    - Automating testing and deployment processes with GitHub Actions.
    - Creating [custom actions](https://github.com/rajandangi/laravel-ci_cd/blob/main/.github/actions/setup/action.yml) to streamline workflows and reduce code repetition.
    - Xdebug and coverage reporting.
    
2. **Dependency Caching**
    - Enhancing CI efficiency by caching PHP extensions and Composer dependencies.


## Resources
- [Github Action Workflow syntax](https://docs.github.com/en/actions/writing-workflows/workflow-syntax-for-github-actions)
- [Github marketplace of actions](https://github.com/marketplace?type=actions)
- [Running pull_request workflow when a pull request merges](https://docs.github.com/en/actions/writing-workflows/choosing-when-your-workflow-runs/events-that-trigger-workflows#running-your-pull_request-workflow-when-a-pull-request-merges)
- [Github Action Checkout](https://github.com/marketplace/actions/checkout)
- [Github Action : Github Script](https://github.com/marketplace/actions/github-script)
- [Setup PHP Action](https://github.com/marketplace/actions/setup-php-action)
- [Automatic Access Token Authentication](https://docs.github.com/en/actions/security-for-github-actions/security-guides/automatic-token-authentication)
- [Containerized Services in Github Actions](https://docs.github.com/en/actions/use-cases-and-examples/using-containerized-services/about-service-containers)
- [Cache action](https://github.com/marketplace/actions/cache)
- [Cache extension for PHP](https://github.com/shivammathur/cache-extensions)
- [Using secrets in GitHub Actions](https://docs.github.com/en/actions/security-for-github-actions/security-guides/using-secrets-in-github-actions)


## Points to remember
- In github, every pull request is an issue. But not every issue is a pull request.
- When a pull request is merges, the PR is automatically closed.
- Secrets and variables are not passed on to the composite run steps. They need to be passed explicitly. For example:

    - `.github/workflows/tests.yml`
        ```yaml
        jobs:
            - name: Setup
              uses: ./.github/actions/setup
              with:
                hidden-password: ${{ secrets.KEY }}
        ```
    - `.github/actions/setup/action.yml`
        ```yaml
        inputs:
            hidden-password:
                description: 'Secret password'
                required: true

        runs:
            using: 'composite'
            steps:
                - name: Setup
                  run: echo ${{ inputs.hidden-password }}
        ```
- With the github action runner image, PHP, Composer and PHPUnit are already installed. Both Xdebug and PCOV extensions are installed, but only Xdebug is enabled. See [here](https://github.com/actions/runner-images/blob/main/images/ubuntu/Ubuntu2404-Readme.md#php-tools)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
