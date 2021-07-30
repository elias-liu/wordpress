在wp-content目录下创建uploads目录，该目录应该要被作为共享目录使用
```
mkdir -p /opt/soft/wordpress/wp-content/uploads
chown -R /opt/soft/wordpress
mount -t nfs 172.16.1.31:/opt/data/wp_data /opt/soft/wordpress/wp-content/uploads
```
