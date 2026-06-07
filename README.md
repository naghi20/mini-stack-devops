# Resource-Optimized DevOps Micro-Stack 🚀

A highly optimized, production-ready DevOps infrastructure deployment designed to run smoothly on minimal-hardware environments (such as an AWS EC2 `t2.micro` instance or local sandbox environments) within roughly **1.5 GB of RAM**.

This project demonstrates container orchestration, reverse proxy routing, infrastructure-as-code pipelines, and persistent database tracking using lightweight base layers.

---

## 🏗️ Architecture Blueprint

The ecosystem consists of four highly isolated container runtimes:

1. **Nginx (Reverse Proxy):** Acts as the single entry point (`port 80`). Routes root traffic to the web application and balances `/jenkins` traffic directly to the automation engine.
2. **PHP-FPM (App Server):** A decoupled, ultra-lightweight Alpine execution layer handling server-side application logic.
3. **MariaDB (Database):** A high-performance SQL relational database engine optimized with specific buffer caps for micro-runtimes.
4. **Jenkins (Automation Server):** An automated CI/CD engine built on an Alpine base to manage testing and container lifecycle signals.

---

## 📊 Hardened Resource Allocation Limits

To prevent hardware freeze or memory exhaustion in shared or constrained environments, strict runtime constraints are enforced via Docker Compose deployment directives:


| Service Component | Base Container Image | RAM Hard Boundary Limit |
| :--- | :--- | :--- |
| **Reverse Proxy** | `nginx:alpine` | **64 MB** |
| **Application Server** | `php:8.2-fpm-alpine` | **128 MB** |
| **Relational Database** | `mariadb:lts` | **300 MB** |
| **Automation Engine** | `jenkins/jenkins:lts-alpine` | **800 MB** |

---

## 📂 Project Directory Structure

```text
mini-stack/
├── docker-compose.yml     # Infrastructure orchestration blueprint
├── nginx/
│   └── default.conf       # Proxy routing rules & gateway paths
└── app/
    ├── index.php          # PHP application & database validation test
    └── Jenkinsfile        # Declarative multi-stage CI/CD pipeline script
```

---

## 🚀 Rapid Deployment Workflow

### 1. Provision Infrastructure
Clone this repository to your host machine or EC2 instance and launch the containers in background mode:
```bash
docker compose up -d
```

### 2. Enable Relational Database Drivers
Because we use raw, lightweight Alpine images, inject the high-performance database driver extension into your active application layer container:
```bash
docker exec local-app docker-php-ext-install pdo_mysql
docker compose restart app
```

### 3. Verify Endpoints
Test local loopback response layers via your CLI terminal:
```bash
# Verify Web App & DB connection matrix
curl -s http://localhost/

# Verify Proxy Routing to Jenkins Gateway
curl -I http://localhost/jenkins/login
```

---

## 🧪 Pipeline Automation Workflow (`Jenkinsfile`)

The repository includes a decoupled programmatic pipeline layout structured into three continuous integration blocks:
* **Lint Code Source:** Validates script structural placements across runtime contexts.
* **Integration Testing:** Assesses data layer health directly over inner container network channels.
* **Production Cache Reload:** Issues safe operational reload parameters to the Nginx reverse proxy without incurring service downtime.





🚀 Final Summary of What You BuiltMicro-Budget Architecture: A multi-tier DevOps platform running fully on less than 1.5 GB of RAM.Declarative CI/CD: Native execution loops checking your logic, testing databases, and issuing dynamic service signals (Jenkinsfile).Production Decoupling: Complete reverse proxy isolation dividing user traffic from administration control points (Nginx).

---

## 📊 Infrastructure Observability & Telemetry

This micro-stack includes an ultra-lightweight performance monitoring pipeline designed to capture real-time hardware telemetry without exceeding our tight memory constraints.

### Monitoring Component Breakdown
1. **Google cAdvisor (Port 8080):** Connects directly to the Linux kernel to analyze resource usage (CPU, memory, file systems, network) of every active container.
2. **Prometheus TSDB (Port 9090):** A highly optimized time-series database configured to scrape metrics from cAdvisor every 15 seconds. It automatically drops historical data after 24 hours (`--storage.tsdb.retention.time=1d`) to protect disk storage.

---

## 🌐 Complete Service Gateway Matrix

Once the stack is deployed locally or via WSL, all services can be accessed using your web browser or command-line interfaces through the following endpoints:


| Service UI Dashboard | Access URL Network Path | Key Operational Use Case |
| :--- | :--- | :--- |
| **PHP Production Web App** | `http://localhost/` | Validates end-to-end routing from proxy down to your MariaDB database instances. |
| **Jenkins Control Center** | `http://localhost/jenkins` | Graphical dashboard to configure, run, and audit automation pipelines. |
| **Google cAdvisor** | `http://localhost:8080` | Native Google dashboard displaying real-time memory and processing utilization metrics per container. |
| **Prometheus Expression Engine** | `http://localhost:9090` | Graphical telemetry query workspace. Use expressions to inspect your stack health. |

### 🔍 Useful Prometheus Metric Expressions
Type these directly into the query bar at `http://localhost:9090` to observe your infrastructure performance:
* **Container RAM Usage:** `container_memory_usage_bytes{name="local-jenkins"}`
* **Container CPU Utilization Percentages:** `sum(rate(container_cpu_usage_seconds_total[5m])) by (name)`
