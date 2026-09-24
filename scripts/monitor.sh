#!/bin/bash
echo "===== System Health Check: $(date) ====="
echo ""
echo "--- Disk Usage ---"
df -h / | tail -1
echo ""
echo "--- Memory Usage ---"
free -h | grep Mem
echo ""
echo "--- Docker Containers Status ---"
docker ps --format "table {{.Names}}\t{{.Status}}"
echo ""
echo "--- CPU Load ---"
uptime
